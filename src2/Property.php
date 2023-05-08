<?php

declare(strict_types=1);

namespace MiBo\Properties;

use InvalidArgumentException;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Property as PropertyContract;
use MiBo\Properties\Contracts\Unit;

/**
 * Class Property
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @template-covariant TUnit of \MiBo\Properties\Contracts\Unit
 */
abstract class Property implements PropertyContract
{
    private int|float $value;

    /** @var TUnit */
    private Unit $unit;

    /**
     * @param int|float $value
     * @param TUnit $unit
     */
    public function __construct(int|float $value, Unit $unit)
    {
        if ($unit::getQuantityClassName() !== static::getQuantityClassName()) {
            throw new InvalidArgumentException(
                sprintf(
                    'Unit %s is not compatible with Quantity %s',
                    $unit::class,
                    static::getQuantityClassName()
                )
            );
        }

        $this->value = $value;
        $this->unit  = $unit;
    }

    /**
     * @return TUnit
     */
    public function getUnit(): Unit
    {
        return $this->unit;
    }

    abstract public static function getQuantityClassName(): string;

    public function getQuantity()
    {
        static $quantities = [];

        if (!key_exists(static::getQuantityClassName(), $quantities)) {
            $quantities[static::getQuantityClassName()] = new (static::getQuantityClassName());
        }

        return $quantities[$this->getQuantityClassName()];
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getBaseValue()
    {
        if ($this->getUnit() instanceof NumericalUnit) {
            return $this->getValue() * $this->getUnit()->getMultiplier();
        }

        return $this->getValue();
    }

    public function convertToUnit(Unit $unit): PropertyContract
    {
        if ($unit->getName() === $this->getUnit()->getName()) {
            return $this;
        }

        if (!$unit instanceof NumericalUnit) {
            throw new \ValueError();
        }

        if ($unit::getQuantityClassName() !== $this::getQuantityClassName()) {
            throw new \ValueError();
        }

        $this->value = $this->getBaseValue() / $unit->getMultiplier();
        $this->unit  = $unit;

        return $this;
    }
}
