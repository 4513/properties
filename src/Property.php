<?php

namespace MiBo\Properties;

use CompileError;
use MiBo\Properties\Contracts\Math;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\QuantityMath;
use MiBo\Properties\Contracts\Unit;

/**
 * Class Property
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @template TUnit of \MiBo\Properties\Contracts\Unit
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Property
{
    /** @var int|float $value */
    protected int|float $value = 0;

    /** @var TUnit */
    protected $unit;

    /**
     * @return TUnit
     */
    public function getUnit(): Unit
    {
        return $this->unit;
    }

    /**
     * @return class-string<Quantity>
     */
    public function getQuantity(): string
    {
        return $this->getUnit()::getQuantity();
    }

    public function getQuantityClass(): Quantity
    {
        return new ($this->getQuantity());
    }

    /**
     * @param int|float $value
     * @param TUnit $unit
     */
    public function __construct(int|float $value, $unit)
    {
        $this->value = $value;
        $this->unit  = $unit;
    }

    /**
     * @return float|int
     */
    public function getValue(): float|int
    {
        return $this->value;
    }

    /**
     * @template T of static
     *
     * @param int|float|T $addend
     *
     * @return static
     */
    public function add(int|float|Property $addend): static
    {
        if (is_int($addend) || is_float($addend)) {
            $this->value += $addend;

            return $this;
        }

        if ($this->getQuantity() !== $addend->getQuantity()) {
            throw new CompileError("Cannot add a value from a different quantity!");
        }

        $this->value += (
            $addend->getValue() /
            ($this->getUnit()->getMultiplier() / $addend->getUnit()->getMultiplier())
        );

        return $this;
    }

    public function subtract(int|float|Property $subtrahend): static
    {
        if (is_int($subtrahend) || is_float($subtrahend)) {
            $this->value -= $subtrahend;

            return $this;
        }

        if ($this->getQuantity() !== $subtrahend->getQuantity()) {
            throw new CompileError("Cannot subtract a value from a different quantity!");
        }

        $this->value -= (
            $subtrahend->getValue() /
            ($this->getUnit()->getMultiplier() / $subtrahend->getUnit()->getMultiplier())
        );

        return $this;
    }

    public function convertUnit(Unit $unit): static
    {
        if ($this->getUnit()->getMultiplier() === $unit->getMultiplier()) {
            return $this;
        }

        $this->value = $this->value /
            ($unit->getMultiplier() / $this->getUnit()->getMultiplier());

        $this->unit = $unit;

        return $this;
    }

    public function multiply(int|float|Property $multiplicand): static
    {
        if (is_int($multiplicand) || is_float($multiplicand)) {
            $this->value *= $multiplicand;

            return $this;
        }

        return QuantityMath::product($this, $multiplicand);
    }

    public function divide(int|float|Property $divisor): static
    {
        if (is_int($divisor) || is_float($divisor)) {
            $this->value = $this->value / $divisor;

            return $this;
        }

        return QuantityMath::ratio($this, $divisor);
    }

    public function abs(): static
    {
        $this->value = Math::absolute($this->value);

        return $this;
    }

    public function ceil(): static
    {
        $this->value = Math::ceil($this->value);

        return $this;
    }

    public function floor(): static
    {
        $this->value = Math::floor($this->value);

        return $this;
    }

    public function round(int $precision = 0, int $mode = PHP_ROUND_HALF_UP): static
    {
        $this->value = Math::round($this->value, $precision, $mode);

        return $this;
    }
}
