<?php

namespace MiBo\Properties;

use CompileError;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\QuantityMath;
use MiBo\Properties\Contracts\Unit;

/**
 * Class Property
 *
 * @package MiBo\Properties
 */
class Property
{
    /** @var int|float $value */
    protected $value = 0;

    protected $unit;

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

    public function __construct($value, Unit $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return float|int
     */
    public function getValue(): float|int
    {
        return $this->value;
    }

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
}
