<?php

declare(strict_types=1);

namespace MiBo\Properties;

use InvalidArgumentException;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Property as PropertyContract;
use MiBo\Properties\Contracts\Quantity;
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
 *
 * @implements \MiBo\Properties\Contracts\Property<TUnit>
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

    /**
     * @inheritDoc
     */
    public function getQuantity(): Quantity
    {
        static $quantities = [];

        if (!key_exists(static::getQuantityClassName(), $quantities)) {
            $quantities[static::getQuantityClassName()] = new (static::getQuantityClassName());
        }

        return $quantities[$this->getQuantityClassName()];
    }

    /**
     * @inheritDoc
     *
     * @return int|float
     */
    public function getValue(): int|float
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function getBaseValue(): mixed
    {
        if ($this->getUnit() instanceof NumericalUnit) {
            return $this->getValue() * $this->getUnit()->getMultiplier();
        }

        return $this->getValue();
    }

    /**
     * @inheritDoc
     *
     * @template TInnerUnit of \MiBo\Properties\Contracts\Unit
     *
     * @param TInnerUnit $unit
     *
     * @phpstan-assert TUnit $unit
     */
    public function convertToUnit(Unit $unit): PropertyContract
    {
        if ($unit::class === $this->getUnit()::class) {
            return $this;
        }

        if (!$unit instanceof NumericalUnit) {
            throw new \ValueError();
        }

        if ($unit::getQuantityClassName() !== $this::getQuantityClassName()) {
            throw new \ValueError();
        }

        $this->value = $this->getBaseValue() / $unit->getMultiplier();

        /** @phpstan-ignore-next-line */
        $this->unit = $unit;

        return $this;
    }

    /**
     * @param int|float $value
     *
     * @return static
     */
    protected function setValue(int|float $value): static
    {
        $this->value = $value;

        return $this;
    }
}
