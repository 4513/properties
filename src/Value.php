<?php

declare(strict_types=1);

namespace MiBo\Properties;

use DivisionByZeroError;
use ValueError;
use const PHP_FLOAT_DIG;

/**
 * Class Value
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @template TBase of positive-int
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

    /** @var TBase */
    private int $base;

    /**
     * @param int|float $value Value to initialize.
     * @param int $exp Exponent of value. Default 0.
     * @param TBase $base Base of value. Default 10.
     */
    public function __construct(int|float $value, int $exp = 0, int $base = 10)
    {
        $this->base = $base;

        $this->add($value, $exp);
    }

    /**
     * Adds value to current value.
     *
     * @param int|float|\MiBo\Properties\Value<TBase> $value Value to add.
     * @param int $exp Exponent of value.
     *
     * @return static Value with added value.
     */
    public function add(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new ValueError();
        }

        if ($value instanceof Value) {
            return $this->addSelf($value, $exp);
        }

        if (self::$preferInfinity === true && is_infinite($value)) {
            $this->infinityMode = true;
            $this->values       = [0 => INF];

            return $this;
        }

        if (is_float($value)) {
            $value = (int) ($value * 10 ** self::$floatExp);
            $exp  -= self::$floatExp;
        }

        if ($value === 0) {
            return $this;
        }

        $value *= $this->multiplier;

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
     * @param \MiBo\Properties\Value<TBase> $value Value to add.
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
     * @param int|float|\MiBo\Properties\Value<TBase> $value Value to subtract.
     * @param int $exp Exponent of value.
     *
     * @return static Value with subtracted value.
     */
    public function subtract(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new ValueError();
        }

        if ($value instanceof Value) {
            return $this->subtractSelf($value, $exp);
        }

        return $this->add(-$value, $exp);
    }

    /**
     * Subtracts value from current value.
     *
     * @param \MiBo\Properties\Value<TBase> $value Value to subtract.
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
     * @param int|float|\MiBo\Properties\Value<TBase> $value Value to multiply.
     * @param int $exp Exponent of value.
     *
     * @return static Value with multiplied value.
     */
    public function multiply(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new ValueError();
        }

        if (self::$preferInfinity === true && is_infinite($value)) {
            $this->infinityMode = true;
            $this->values       = [0 => INF];

            return $this;
        }

        if (empty($this->values)) {
            return $this;
        }

        if ($value instanceof Value) {
            return $this->multiplySelf($value, $exp);
        }

        if ($value === 0 || $value === 0.0) {
            $this->values = [];

            return $this;
        }

        if ($exp === 0 && ($value === 1 || $value === 1.0)) {
            return $this;
        }

        $values = [];

        if ($this->multiplier !== 1 && $value === $this->multiplier) {
            $this->multiplier = 1;
            $value            = 1;
        }

        foreach ($this->values as $exp2 => $val) {
            $values[$exp2 + $exp] = $val * $value;
        }

        $this->values = $values;

        return $this;
    }

    /**
     * Multiplies value with current value.
     *
     * @param \MiBo\Properties\Value<TBase> $value Value to multiply.
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
     * @param int|float|\MiBo\Properties\Value<TBase> $value Value to divide.
     * @param int $exp Exponent of value.
     *
     * @return static Value with divided value.
     */
    public function divide(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new ValueError();
        }

        if ($value instanceof Value) {
            return $this->divideSelf($value, $exp);
        }

        if (($value === 0 || $value === 0.0)) {
            if (self::$preferInfinity === true) {
                $this->infinityMode = true;
                $this->values       = [0 => INF];

                return $this;
            }

            throw new DivisionByZeroError();
        }

        if (is_infinite($value)) {
            if (self::$preferInfinity === true) {
                $this->infinityMode = true;
                $this->values       = [];
                $this->values[0]    = 0;

                return $this;
            }

            throw new ValueError();
        }

        $this->multiply(1, -$exp);

        $this->multiplier *= $value;

        return $this;
    }

    /**
     * Divides value with current value.
     *
     * @param \MiBo\Properties\Value<TBase> $value Value to divide.
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

        ksort($this->values);

        $value   = 0;
        $minExp  = $this->getMinExp();
        $expDiff = $minExp < 0 ? -$minExp : 0;

        foreach ($this->values as $exp => $val) {
            $value += $val * 10 ** ($exp + $expDiff);
        }

        $earlyResult1 = $value / 10 ** ($expDiff + $requestedExp);
        $earlyResult2 = $value * 10 ** (- $requestedExp - $expDiff);

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
     * @param \MiBo\Properties\Value<TBase> $value Value to compare.
     *
     * @return void
     *
     * @phpstan-assert \MiBo\Properties\Value<TBase> $value
     */
    protected function checkBaseBeforeOperation(Value $value): void
    {
        if ($this->base !== $value->getBase()) {
            throw new ValueError();
        }
    }
}
