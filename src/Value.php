<?php

declare(strict_types = 1);

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
 * @since x.x
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

    public function __construct(int|float $value, int $exp = 0)
    {
        $this->add($value, $exp);
    }

    public function add(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new ValueError();
        }

        if ($value instanceof Value) {
            return $this->addSelf($value, $exp);
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

    private function addSelf(Value $value, int $exp): static
    {
        foreach ($value->getValues() as $innerExp => $val) {
            $this->add($val, $innerExp + $exp);
        }

        return $this;
    }

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

    private function subtractSelf(Value $value, int $exp): static
    {
        foreach ($value->getValues() as $innerExp => $val) {
            $this->subtract($val, $exp + $innerExp);
        }

        return $this;
    }

    public function multiply(int|float|Value $value, int $exp = 0): static
    {
        if ($this->infinityMode === true) {
            throw new ValueError();
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

    private function multiplySelf(Value $value, int $exp): static
    {
        foreach ($value->getValues() as $innerExp => $val) {
            $this->multiply($val, $exp + $innerExp);
        }

        return $this;
    }

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
                $positive           = $this->getValue() >= 0;
                $this->infinityMode = true;
                $this->values       = [];
                $this->values[0]    = $positive ? INF : -INF;

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

    private function divideSelf(Value $value, int $exp): static
    {
        foreach ($value->getValues() as $innerExp => $val) {
            $this->divide($val, $exp - $innerExp);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

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
            || ((float) ((int) $earlyResult1) === $earlyResult1) && (int) $earlyResult1 !== 0) {
            $earlyResult2 = (int) $earlyResult2;
        }

        $calculatedResult = $earlyResult2 / $this->multiplier;

        if (is_int($calculatedResult)) {
            return $calculatedResult;
        }

        if ($precision >= PHP_FLOAT_DIG) {
            return $calculatedResult;
        }

        return round($calculatedResult, $precision);
    }

    public function getMinExp(): int
    {
        return min(array_keys($this->values) ?: [0]);
    }
}
