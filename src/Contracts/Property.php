<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Interface Property
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @template-covariant TUnit of \MiBo\Properties\Contracts\Unit
 * @template-covariant TValue of mixed
 */
interface Property
{
    /**
     * Returns the Unit.
     *
     * @return TUnit
     */
    public function getUnit(): Unit;

    /**
     * Returns the Quantity class name.
     *
     * @return class-string<\MiBo\Properties\Contracts\Quantity> The class name of the Quantity.
     */
    public static function getQuantityClassName(): string;

    /**
     * Returns the Quantity.
     *
     * @return \MiBo\Properties\Contracts\Quantity The Quantity.
     */
    public function getQuantity(): Quantity;

    /**
     * Returns the value.
     *
     * @return TValue
     */
    public function getValue(): mixed;

    /**
     * Returns the base value.
     *
     * @return TValue
     */
    public function getBaseValue(): mixed;

    /**
     * Returns the value in the given unit.
     *
     * @param \MiBo\Properties\Contracts\Unit $unit The unit.
     *
     * @return \MiBo\Properties\Contracts\Property<TUnit> The property in the given unit.
     */
    public function convertToUnit(Unit $unit): Property;
}
