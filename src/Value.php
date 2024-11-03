<?php

declare(strict_types=1);

namespace MiBo\Properties;

use JetBrains\PhpStorm\Pure;
use MiBo\Properties\Exceptions\CalculationWithInfinityException;
use MiBo\Properties\Exceptions\DivisionByZeroException;
use function array_keys;
use function is_float;
use function is_infinite;
use function is_int;
use function key_exists;
use function ksort;
use function min;
use function number_format;
use function preg_match;
use function round;
use const INF;
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
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Value
{
    public static int $floatExp = PHP_FLOAT_DIG;

    public static bool $preferInfinity = false;

    /** @var array<int, int|float> */
    private array $values = [];

    private int|float $multiplier = 1;

    private bool $infinityMode = false;

    private int|float|null $precision;

    private int|float|null $calculated = null;

    /**
     * @param int|float $value Value to initialize the object with.
     * @param int $exp Exponent of value. Default 0.
     * @param int|float|null $precision Precision of the value. Default null, which means that the value
     *     is a float by default. The precision behaves like the number of decimal places.
     *     If the value is a float, the precision allows to have steps of numbers, like 0.05, 0.1, 0.15, etc.
     */
    public function __construct(int|float $value, int $exp = 0, int|float|null $precision = null)
    {
        $this->precision = $precision;

        $this->add($value, $exp);
    }

    /**
     * @param int|float|\MiBo\Properties\Value $value
     * @param int $exp
     *
     * @return static
     *
     * @phpstan-inpure
     */
    public function add(int|float|self $value, int $exp = 0): static
    {
        // The value is in infinity mode. One cannot add or subtract anything from the infinity.
        if ($this->infinityMode === true) {
            throw CalculationWithInfinityException::alreadyInfinity();
        }

        // If the provided value is Value object, then we need to handle it differently.
        if (!is_int($value) && !is_float($value)) {
            return $this->addSelf($value, $exp);
        }

        //  If the client wants to use an infinity mode enabled and the value is infinite, then we set
        // the current value as an infinity.
        if (self::$preferInfinity === true && is_float($value) && is_infinite($value)) {
            $this->infinityMode = true;
            $this->values       = [0 => $value];
            $this->calculated   = $value;

            return $this;
        }

        if (is_float($value) && is_infinite($value)) {
            throw CalculationWithInfinityException::infinityProvided();
        }

        [
            $value,
            $exp,
        ] = $this->preparePrecision($value, $exp);

        //  If the value is float, but no decimal places provided (.0), then we convert it to an integer.
        //  Same applies if the current float exponent is higher than the provided float value which results
        // into an integer.
        if (is_float($value) && preg_match('/([\.][\d]+)/', (string) $value) === 0) {
            $value = (int) $value;
        } elseif (is_float($value)) {
            $tmpValue = (int) number_format($value * 10 ** self::$floatExp, 0, '', '');

            if ($tmpValue !== PHP_INT_MAX && $tmpValue !== PHP_INT_MIN) {
                $value = $tmpValue;
                $exp  -= self::$floatExp;
            }
        }

        // The provided value is equal to 0, so we do nothing.
        // No need to check for 0.0 (float) value, because it is already handled above to convert it to an int.
        if ($value === 0) {
            return $this;
        }

        // The provided value is multiplied by the multiplier.
        // Then the 'calculated' cache property is reset so the object knows it has to calculate its value again.
        $value           *= $this->multiplier;
        $this->calculated = null;

        // If no value with the same exponent exists, we create a new one.
        if (!key_exists($exp, $this->values)) {
            $this->values[$exp] = $value;

            return $this;
        }

        // Otherwise, we add the value to the existing exponent.
        $this->values[$exp] += $value;

        // If the result within the exponent is equal to 0, we can remove it.
        if ($this->values[$exp] === 0 && $this->infinityMode === false) {
            unset($this->values[$exp]);
        }

        return $this;
    }

    /**
     * @param int|float|\MiBo\Properties\Value $value
     * @param int $exp
     *
     * @return static
     *
     * @phpstan-inpure
     */
    public function subtract(int|float|self $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw CalculationWithInfinityException::alreadyInfinity();
        }

        if (!is_int($value) && !is_float($value)) {
            return $this->subtractSelf($value, $exp);
        }

        // Process of subtracting is the very same as adding. We only negate the value.
        return $this->add(-$value, $exp);
    }

    /**
     * @param int|float|\MiBo\Properties\Value $value
     * @param int $exp
     *
     * @return static
     *
     * @phpstan-inpure
     */
    public function multiply(int|float|self $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw CalculationWithInfinityException::alreadyInfinity();
        }

        if (self::$preferInfinity === true && is_float($value) && is_infinite($value)) {
            $this->infinityMode = true;
            $this->values       = [0 => $value];
            $this->calculated   = $value;

            return $this;
        }

        if (is_float($value) && is_infinite($value)) {
            throw CalculationWithInfinityException::infinityProvided();
        }

        // Empty object equals to 0. Multiplying by 0 equals to 0.
        if ($this->values === []) {
            return $this;
        }

        if (!is_int($value) && !is_float($value)) {
            return $this->multiplySelf($value, $exp);
        }

        // If the provided value is 0, then the result is 0.
        if ($value === 0 || $value === 0.0) {
            $this->values     = [];
            $this->calculated = 0;

            return $this;
        }

        // Multiplying by 1 does not change the value.
        if ($exp === 0 && ($value === 1 || $value === 1.0)) {
            return $this;
        }

        // Try to find the true value and reset the calculated cache.
        $trueValue        = $value * 10 ** $exp;
        $this->calculated = null;

        //  The provided value is a ratio. To get more precise result, we multiply this object first by 100
        // and then divide it by the true value.
        if ($this->hasPrecision() && $trueValue < 1 && $trueValue > -1) {
            $this->multiply(100);
            $this->divide(100 / $trueValue);

            return $this;
        }

        //  We try to divide the value as little as possible, and so we try to use the multiplication
        // to reduce the divisor.
        if ($this->multiplier !== 1 && $value === $this->multiplier) {
            $this->multiplier = 1;
            $value            = 1;
        } elseif ((is_int($value) || round($value) === $value) && ((int) $value) % $this->multiplier === 0) {
            $value           /= $this->multiplier;
            $this->multiplier = 1;
        }

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
     * @param int|float|\MiBo\Properties\Value $value
     * @param int $exp
     *
     * @return static
     *
     * @phpstan-inpure
     */
    public function divide(int|float|self $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw CalculationWithInfinityException::alreadyInfinity();
        }

        if (!is_int($value) && !is_float($value)) {
            return $this->divideSelf($value, $exp);
        }

        // Dividing by 0 is allowed only in the infinity mode enabled.
        if ($value === 0 || $value === 0.0) {
            if (self::$preferInfinity === false) {
                throw DivisionByZeroException::divisionByZero();
            }

            $inf                = min(0.0, $this->getValue()) === 0.0 ? INF : -INF;
            $this->infinityMode = true;
            $this->values       = [0 => $inf];
            $this->calculated   = $inf;

            return $this;
        }

        // Dividing by infinity is allowed only in infinity mode enabled.
        if (is_infinite($value)) {
            if (self::$preferInfinity === false) {
                throw CalculationWithInfinityException::infinityProvided();
            }

            $this->infinityMode = true;
            $this->values       = [0 => 0];
            $this->calculated   = 0;

            return $this;
        }

        //  First we divide the exponent which allows us to simplify the calculation and avoid
        // the floating point.
        $this->multiply(1, -$exp);

        // The provided value is 1. We do not need to divide anything.
        if ($value === 1 || (round($value) === $value && $value === 1.0)) {
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
     * Returns the final value of this object.
     *
     * @param int $requestedExp Exponent of the final value.
     * @param int|float|null $precision Precision of the final value.
     *
     * @return int|float
     */
    #[Pure]
    public function getValue(int $requestedExp = 0, int|float|null $precision = null): int|float
    {
        // The value is either infinity or 0.
        if ($this->infinityMode === true) {
            return $this->values[0] ?? 0;
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
        $earlyResult2 = $this->calculated * 10 ** (-$requestedExp - $expDiff);

        if ((float) ((int) $earlyResult2) === $earlyResult2
            || ((float) ((int) $earlyResult1) === $earlyResult1)
            && (int) $earlyResult1 !== 0
        ) {
            $earlyResult2 = (int) $earlyResult2;
        }

        $calculateResult = $earlyResult2 / $this->multiplier;

        if (is_int($calculateResult)) {
            return $calculateResult;
        }

        $precision ??= $this->precision;
        $precision ??= 5;

        if ($precision >= PHP_FLOAT_DIG) {
            return $calculateResult;
        }

        $rounded = $this->roundValue($calculateResult, is_int($calculateResult), $precision);

        return $precision <= 0 ? (int) $rounded : $rounded;
    }

    /**
     * @return array<int, int|float> Values of this object.
     */
    #[Pure]
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * Determines whether the value is infinity.
     *
     * Available only for infinity mode.
     *
     * @return bool
     */
    #[Pure]
    public function isInfinite(): bool
    {
        return self::$preferInfinity && $this->infinityMode && is_infinite($this->values[0] ?? 0);
    }

    /**
     * Determines whether the value is almost zero.
     *
     * Available for infinity mode only.
     *
     * @return bool
     */
    #[Pure]
    public function isAlmostZero(): bool
    {
        return self::$preferInfinity && $this->infinityMode && ($this->values[0] ?? 0) === 0;
    }

    #[Pure]
    public function getMinExp(): int
    {
        if ($this->values === []) {
            return 0;
        }

        return min(array_keys($this->values));
    }

    /**
     * @param \MiBo\Properties\Value $value
     * @param int $exp
     *
     * @return static
     *
     * @phpstan-inpure
     */
    protected function addSelf(self $value, int $exp): static
    {
        // Copying each value from the provided object to the current object.
        foreach ($value->getValues() as $innerExp => $val) {
            $this->add($val, $innerExp + $exp);
        }

        return $this;
    }

    /**
     * @param \MiBo\Properties\Value $value
     * @param int $exp
     *
     * @return static
     *
     * @phpstan-inpure
     */
    protected function subtractSelf(self $value, int $exp): static
    {
        foreach ($value->getValues() as $innerExp => $val) {
            $this->subtract($val, $exp + $innerExp);
        }

        return $this;
    }

    /**
     * @param \MiBo\Properties\Value $value
     * @param int $exp
     *
     * @return static
     *
     * @phpstan-inpure
     */
    protected function multiplySelf(self $value, int $exp): static
    {
        // The provided value equals to 0. The result is 0.
        if ($value->getValues() === []) {
            $this->values     = [];
            $this->calculated = 0;

            return $this;
        }

        foreach ($value->getValues() as $innerExp => $val) {
            $this->multiply($val, $exp + $innerExp);
        }

        return $this;
    }

    /**
     * @param \MiBo\Properties\Value $value
     * @param int $exp
     *
     * @return static
     *
     * @phpstan-inpure
     */
    protected function divideSelf(self $value, int $exp): static
    {
        if ($value->getValues() === []) {
            throw DivisionByZeroException::divisionByZero();
        }

        foreach ($value->getValues() as $innerExp => $val) {
            $this->divide($val, $innerExp - $exp);
        }

        return $this;
    }

    #[Pure]
    private function hasPrecision(): bool
    {
        return $this->precision !== null;
    }

    /**
     * @param int|float $value
     * @param int $exp
     *
     * @return array{
     *     0: int|float,
     *     1: int
     * }
     */
    #[Pure]
    private function preparePrecision(int|float $value, int $exp): array
    {
        // No need to modify the provided value as no precision is set.
        if (!$this->hasPrecision()) {
            return [
                $value,
                $exp,
            ];
        }

        // Check if we can make an integer from the provided value.
        // Then we round the value to the precision.
        $tmpValue = $value * 10 ** $exp;
        $int      = is_int($tmpValue);
        $rounded  = $this->roundValue($tmpValue, $int, $this->precision);

        // Result of rounding is the same as the provided value. We cannot do anything to simplify it.
        if ($rounded === $tmpValue) {
            return [
                $value,
                $exp,
            ];
        }

        // The value has been rounded. Now, we try to make an integer from it if possible.
        return [
            $this->precision <= 0 ? (int) $rounded : $rounded,
            0,
        ];
    }

    #[Pure]
    private function roundValue(int|float $tmpValue, bool $asInt, int|float $precision): int|float
    {
        $intRound = is_int($precision) || round($precision) === $precision;

        // Rounding with no step (default)
        if ($intRound) {
            $rounded = round($tmpValue, (int) $precision);

            return $asInt ? (int) $rounded : $rounded;
        }

        // We apply rounding with a step (e.g. 0.5 round type) which allows us to make stepped numbers.
        // Example of 0.5 step: 0.5, 1.0, 1.5,...
        // Example of -1.5 step: 0, 5, 10, 15,...
        $ratio    = 1 / (float) preg_replace('/^\-\d+\./', '0.', (string) $precision);
        $tmpValue *= $ratio;
        $tmpValue = round($tmpValue, (int) $precision);
        $tmpValue /= $ratio;

        return $asInt ? (int) $tmpValue : $tmpValue;
    }
}
