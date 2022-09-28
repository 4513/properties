<?php

namespace MiBo\Properties;

use CompileError;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Units\NoQuantity\NoUnit;

/**
 * Class Property
 *
 * @package MiBo\Properties
 */
class Property
{
    /** @var int|float $value */
    protected $value = 0;

    public function getUnit(): Unit {return NoUnit::get();}

    public function getQuantity(): string {return "";}

    public function getQuantityClass(): Quantity {return new Area();}

    public function __construct($value, Unit $unit)
    {
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
            throw new CompileError("Cannot add value from a different quantity!");
        }



        $this->value += $addend->getUnit()->useMultiplier($addend->getValue());

        return $this;
    }
}
