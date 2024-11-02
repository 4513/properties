<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Exceptions\BaseMismatchError;
use MiBo\Properties\Exceptions\CalculationWithInfinityException;
use MiBo\Properties\Exceptions\DivisionByZeroException;
use function is_float;
use function is_int;
use const PHP_FLOAT_DIG;

/**
 * Class Value
 *
 * This class is used for storing values of number. Basically, the class is numeric, either integer or float.
 *
 *  The class implements general methods for mathematical operations, such as addition, subtraction,
 * multiplication, division.
 *
 * The class is only responsible for:
 * * storing the value;
 * * storing the exponent;
 * * storing the precision;
 * * combining values (int, float and the Value itself) using mathematical operations.
 *
 * The class must not:
 * * convert the value to another unit.
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Value
{
    /**
     * @var array<int, int|float>
     */
    private array $values = [];

    private int|float $multiplier = 1;

    public static int $floatExp = PHP_FLOAT_DIG;

    public static bool $preferInfinity = false;

    private bool $infinityMode = false;

    private int|float|null $precision;

    /** @var positive-int */
    private int $base;

    private int|float|null $calculated = null;

    /**
     * @param int|float $value Value to initialize.
     * @param int $exp Exponent of value. Default 0.
     * @param int|float|null $precision Precision of value. Default null, meaning, that the value is a float by
     *      default.
     * @param positive-int $base Base of value. Default 10.
     */
    public function __construct(
        int|float $value,
        int $exp = 0,
        int|float|null $precision = null,
        int $base = 10
    )
    {
        $this->precision = $precision;
        $this->base      = $base;

        $this->add($value, $exp);
    }

    /**
     * Adds value to current value.
     *
     * @param int|float|\MiBo\Properties\Value $value Value to add.
     * @param int $exp Exponent of value.
     *
     * @return static Value with added value.
     *
     * @throws \MiBo\Properties\Exceptions\CalculationWithInfinityException If the value is already infinite.
     */
    public function add(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new CalculationWithInfinityException(
                "The value is already either infinite or almost zero. Cannot add or subtract from it."
            );
        }

        if ($value instanceof Value) {
            return $this->addSelf($value, $exp);
        }

        if (self::$preferInfinity === true && is_infinite($value)) {
            $this->infinityMode = true;
            $this->values       = [0 => INF];
            $this->calculated   = INF;

            return $this;
        }

        [
            $value,
            $exp,
        ] = $this->preparePrecision($value, $exp);

        if (is_float($value) && !preg_match('/([\.][\d]+)/', (string) $value)) {
            $value = (int) $value;
        } else if (is_float($value)) {
            $tmpValue = (int) number_format($value * 10 ** self::$floatExp, 0, '', '');

            if ($tmpValue !== PHP_INT_MAX && $tmpValue !== PHP_INT_MIN) {
                $value = $tmpValue;
                $exp  -= self::$floatExp;
            }
        }

        if ($value === 0) {
            return $this;
        }

        $value           *= $this->multiplier;
        $this->calculated = null;

        if (!isset($this->values[$exp])) {
            $this->values[$exp] = $value;

            return $this;
        }

        $this->values[$exp] += $value;

        if ($this->values[$exp] === 0 && $this->infinityMode === false) {
            unset($this->values[$exp]);
        }

        return $this;
    }

    /**
     * Adds value to current value.
     *
     * @param \MiBo\Properties\Value $value Value to add.
     * @param int $exp Exponent of value.
     *
     * @return static Value with added value.
     */
    private function addSelf(Value $value, int $exp): static
    {
        $this->checkBaseBeforeOperation($value);

        foreach ($value->getValues() as $innerExp => $val) {
            $this->add($val, $innerExp + $exp);
        }

        return $this;
    }

    /**
     * Subtracts value from current value.
     *
     * @param int|float|\MiBo\Properties\Value $value Value to subtract.
     * @param int $exp Exponent of value.
     *
     * @return static Value with subtracted value.
     */
    public function subtract(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new CalculationWithInfinityException(
                "The value is already either infinite or almost zero. Cannot add or subtract from it."
            );
        }

        if ($value instanceof Value) {
            return $this->subtractSelf($value, $exp);
        }

        return $this->add(-$value, $exp);
    }

    /**
     * Subtracts value from current value.
     *
     * @param \MiBo\Properties\Value $value Value to subtract.
     * @param int $exp Exponent of value.
     *
     * @return static Value with subtracted value.
     */
    private function subtractSelf(Value $value, int $exp): static
    {
        $this->checkBaseBeforeOperation($value);

        foreach ($value->getValues() as $innerExp => $val) {
            $this->subtract($val, $exp + $innerExp);
        }

        return $this;
    }

    /**
     * Multiplies value with current value.
     *
     * @param int|float|\MiBo\Properties\Value $value Value to multiply.
     * @param int $exp Exponent of value.
     *
     * @return static Value with multiplied value.
     */
    public function multiply(int|float|Value $value, int $exp = 0): static
    {
        // The infinity mode has been triggered and so the value cannot be changed anymore.
        if ($this->infinityMode === true) {
            throw new CalculationWithInfinityException(
                "The value is already either infinite or almost zero. Cannot multiply or divide it."
            );
        }

        // We try to multiply by the infinity. That means we trigger the infinity mode.
        if (self::$preferInfinity === true && is_float($value) && is_infinite($value)) {
            $this->infinityMode = true;
            $this->values       = [0 => INF];
            $this->calculated   = INF;

            return $this;
        }

        // Current value is equal to zero. So we can return zero.
        if (empty($this->values)) {
            return $this;
        }

        if ($value instanceof Value) {
            return $this->multiplySelf($value, $exp);
        }

        // We try to multiply by zero. That means we can return zero.
        if ($value === 0 || $value === 0.0) {
            $this->values     = [];
            $this->calculated = 0;

            return $this;
        }

        // We try to multiply by one. We return the current value.
        if ($exp === 0 && ($value === 1 || $value === 1.0)) {
            return $this;
        }

        $trueValue        = $value * 10 ** $exp;
        $this->calculated = null;

        if ($this->hasPrecision() && $trueValue < 1 && $trueValue > -1) {
            $this->multiply(100);
            $this->divide(100 / $trueValue);

            return $this;
        }

        // Dividing optimize.
        //  We try to divide the value as little as possible, and so we try to use the multiplication
        // to reduce the divisor.
        if ($this->multiplier !== 1 && $value === $this->multiplier) {
            $this->multiplier = 1;
            $value            = 1;
        } else if ($value % $this->multiplier === 0) {
            $value           /= $this->multiplier;
            $this->multiplier = 1;
        }

        // Here we multiply the numbers.
        $values    = [];
        $tmpValues = [];

        foreach ($this->values as $exp2 => $val) {
            $innerExp = $exp2 + $exp;

            [
                $val,
                $correctExp,
            ] = $this->preparePrecision($val * $value, $innerExp);

            if ($correctExp === $innerExp) {
                $values[$innerExp] = $val;
            } else {
                $tmpValues[$correctExp] = $val;
            }
        }

        foreach ($tmpValues as $exp2 => $val) {
            $values[$exp2] = $val + ($values[$exp2] ?? 0);
        }

        $this->values = $values;

        return $this;
    }

    /**
     * Multiplies value with current value.
     *
     * @param \MiBo\Properties\Value $value Value to multiply.
     * @param int $exp Exponent of value.
     *
     * @return static Value with multiplied value.
     */
    private function multiplySelf(Value $value, int $exp): static
    {
        $this->checkBaseBeforeOperation($value);

        if (empty($value->getValues())) {
            $this->values = [];

            return $this;
        }

        foreach ($value->getValues() as $innerExp => $val) {
            $this->multiply($val, $exp + $innerExp);
        }

        return $this;
    }

    /**
     * Divides value with current value.
     *
     * @param int|float|\MiBo\Properties\Value $value Value to divide.
     * @param int $exp Exponent of value.
     *
     * @return static Value with divided value.
     * @phpstan-return ($value is 0 ? never : static)
     *
     * @throws \MiBo\Properties\Exceptions\DivisionByZeroException If the value is
     * zero.
     */
    public function divide(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new CalculationWithInfinityException(
                "The value is already either infinite or almost zero. Cannot multiply or divide it."
            );
        }

        if ($value instanceof Value) {
            return $this->divideSelf($value, $exp);
        }

        if (($value === 0 || $value === 0.0)) {
            if (self::$preferInfinity === true) {
                $this->infinityMode = true;
                $this->values       = [0 => INF];
                $this->calculated   = INF;

                return $this;
            }

            throw new DivisionByZeroException();
        }

        if (is_infinite($value)) {
            if (self::$preferInfinity === true) {
                $this->infinityMode = true;
                $this->values       = [0 => 0];
                $this->calculated   = 0;

                return $this;
            }

            throw new CalculationWithInfinityException(
                "Infinite number provided! Make sure to enable the infinity mode."
            );
        }

        $this->multiply(1, -$exp);

        if ($value === 1 || $value === 1.0) {
            return $this;
        }

        if ($this->hasPrecision()) {
            $currentValue     = $this->getValue();
            $this->calculated = null;
            [
                $newValue,
                $exp,
            ]                 = $this->preparePrecision($currentValue / $value, 0);
            $this->values     = [$exp => $newValue];
            $this->multiplier = 1;

            return $this;
        }

        $this->calculated  = null;
        $this->multiplier *= $value;

        return $this;
    }

    /**
     * Divides value with current value.
     *
     * @param \MiBo\Properties\Value $value Value to divide.
     * @param int $exp Exponent of value.
     *
     * @return static Value with divided value.
     */
    private function divideSelf(Value $value, int $exp): static
    {
        $this->checkBaseBeforeOperation($value);

        foreach ($value->getValues() as $innerExp => $val) {
            $this->divide($val, $innerExp - $exp);
        }

        return $this;
    }

    /**
     * Rounds the value.
     *
     * @param int $precision Precision to round to. Negative values represent digits before the decimal point.
     * @param int<1, 4> $mode PHP Rounding mode.
     *
     * @return static
     */
    public function round(int $precision = 0, int $mode = PHP_ROUND_HALF_UP): static
    {
        if ($this->infinityMode === true) {
            return $this;
        }

        $exp              = $this->getMinExp();
        $currentValue     = $this->getValue($exp);
        $this->values     = [$exp => round($currentValue, $precision + $exp, $mode)];
        $this->calculated = null;

        return $this;
    }

    /**
     * Rounds the value up.
     *
     * @param int $precision Precision to round to. Negative values represent digits before the decimal point.
     *
     * @return static
     */
    public function ceil(int $precision = 0): static
    {
        if ($this->infinityMode === true) {
            return $this;
        }

        $this->values     = [-$precision => ceil($this->getValue(-$precision))];
        $this->calculated = null;

        return $this;
    }

    /**
     * Rounds the value down.
     *
     * @param int $precision Precision to round to. Negative values represent digits before the decimal point.
     *
     * @return static
     */
    public function floor(int $precision = 0): static
    {
        if ($this->infinityMode === true) {
            return $this;
        }

        $this->values     = [-$precision => floor($this->getValue(-$precision))];
        $this->calculated = null;

        return $this;
    }

    /**
     * Returns all values to be part of the final result.
     *
     * @return array<int, int|float> Values of value.
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * Returns the final value.
     *
     * @param int $requestedExp Exponent of value.
     * @param int $precision Precision of value.
     *
     * @return int|float Final value.
     */
    public function getValue(int $requestedExp = 0, int $precision = 10): int|float
    {
        if ($this->infinityMode === true) {
            return $this->values[0];
        }

        $minExp  = $this->getMinExp();
        $expDiff = $minExp < 0 ? -$minExp : 0;

        if ($this->calculated === null) {
            ksort($this->values);

            $value = 0;

            foreach ($this->values as $exp => $val) {
                $value += $val * 10 ** ($exp + $expDiff);
            }

            $this->calculated = $value;
        }

        $earlyResult1 = $this->calculated / 10 ** ($expDiff + $requestedExp);
        $earlyResult2 = $this->calculated * 10 ** (- $requestedExp - $expDiff);

        if ((float) ((int) $earlyResult2) === $earlyResult2
            || ((float) ((int) $earlyResult1) === $earlyResult1) && (int) $earlyResult1 !== 0
        ) {
            $earlyResult2 = (int) $earlyResult2;
        }

        $calculatedResult = $earlyResult2 / $this->multiplier;

        if (is_int($calculatedResult)) {
            return $calculatedResult;
        }

        if ($precision >= PHP_FLOAT_DIG) {
            return $calculatedResult;
        }

        $rounded = round($calculatedResult, $precision);

        return $precision === 0 ? (int) $rounded : $rounded;
    }

    /**
     * @return int Minimum exponent of value.
     */
    public function getMinExp(): int
    {
        return min(array_keys($this->values) ?: [0]);
    }

    /**
     * @return bool Whether value is infinite.
     */
    public function isInfinite(): bool
    {
        return self::$preferInfinity && $this->infinityMode && isset($this->values[0]) && is_infinite($this->values[0]);
    }

    /**
     * @return bool Whether the value has been divided by infinity.
     */
    public function isAlmostZero(): bool
    {
        return self::$preferInfinity && $this->infinityMode && isset($this->values[0]) && $this->values[0] !== INF;
    }

    /**
     * @return positive-int
     */
    public function getBase(): int
    {
        return $this->base;
    }

    /**
     * Checks that two values have the same base.
     *
     * @param \MiBo\Properties\Value $value Value to compare.
     *
     * @return void
     *
     * @throws \MiBo\Properties\Exceptions\BaseMismatchError If bases do not match.
     */
    protected function checkBaseBeforeOperation(Value $value): void
    {
        if ($this->base !== $value->getBase()) {
            throw new BaseMismatchError("Cannot perform operation on values with different bases!");
        }
    }

    /**
     * Whether the value has a precision.
     *
     * @return bool
     *
     * @phpstan-assert-if-true !null $this->precision
     */
    private function hasPrecision(): bool
    {
        return $this->precision !== null;
    }

    /**
     * @param int|float $value
     * @param int $exp
     *
     * @return array{0: int|float, 1: int}
     */
    protected function preparePrecision(int|float $value, int $exp): array
    {
        if (!$this->hasPrecision()) {
            return [
                $value,
                $exp,
            ];
        }

        $tmpValue = $value * 10 ** $exp;
        $int      = is_int($tmpValue);
        $rounded  = $this->roundValue($tmpValue, $int, $this->precision);

        if ($rounded === $tmpValue) {
            return [
                $value,
                $exp,
            ];
        }

        return [
            $this->precision <= 0 ? (int) $rounded : $rounded,
            0,
        ];
    }

    private function roundValue(int|float $tmpValue, bool $asInt, int|float $precision): int|float
    {
        $intRound = is_int($precision) || round($precision) === $precision;

        if ($intRound) {
            $rounded = round($tmpValue, (int) $precision);

            return $asInt ? (int) $rounded : $rounded;
        }

        $ratio    = 1 / (float) preg_replace('/^-?\d+\./', '0.', (string) $precision);
        $tmpValue = $tmpValue * $ratio;
        $tmpValue = round($tmpValue, (int) $precision);
        $tmpValue = $tmpValue / $ratio;

        return $asInt ? (int) $tmpValue : $tmpValue;
    }
}
