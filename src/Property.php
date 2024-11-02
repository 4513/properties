<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Contracts\Property as PropertyContract;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Exceptions\IncompatiblePropertyError;

/**
 * Class Property
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @template-covariant TUnit of \MiBo\Properties\Contracts\Unit
 * @template-covariant TValue of mixed
 *
 * @implements \MiBo\Properties\Contracts\Property<TUnit, TValue>
 */
abstract class Property implements PropertyContract
{
    /** @var TValue */
    private $value;

    /** @var TUnit */
    protected Unit $unit;

    /** @var array<array{value: self<TUnit, TValue>, unit: \MiBo\Properties\Contracts\Unit}> */
    protected array $convertedValues = [];

    /**
     * @param TValue $value
     * @param TUnit $unit
     */
    public function __construct($value, Unit $unit)
    {
        if ($unit::getQuantityClassName() !== static::getQuantityClassName()) {
            throw new IncompatiblePropertyError(
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
     * @inheritDoc
     *
     * @return TUnit
     */
    public function getUnit(): Unit
    {
        return $this->unit;
    }

    /**
     * @inheritDoc
     */
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
     * @return TValue
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function getBaseValue(): mixed
    {
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
    abstract public function convertToUnit(Unit $unit): PropertyContract;

    /**
     * @phpstan-ignore-next-line
     * @param TValue $value
     *
     * @return static
     */
    protected function setValue($value): static
    {
        $this->value = $value;

        return $this;
    }

    public function __clone(): void
    {
        $this->value = clone $this->value;
        $this->unit  = clone $this->unit;
    }
}
