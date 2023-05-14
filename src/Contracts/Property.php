<?php

declare(strict_types = 1);

namespace MiBo\Properties\Contracts;

/**
 * Interface Property
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @template-covariant TUnit of \MiBo\Properties\Contracts\Unit
 */
interface Property
{
    /**
     * @return \MiBo\Properties\Contracts\Unit
     */
    public function getUnit(): Unit;

    /**
     * @return class-string<\MiBo\Properties\Contracts\Quantity>
     */
    public static function getQuantityClassName(): string;

    /**
     * @return \MiBo\Properties\Contracts\Quantity
     */
    public function getQuantity(): Quantity;

    /**
     * @return mixed
     */
    public function getValue(): mixed;

    /**
     * @return mixed
     */
    public function getBaseValue(): mixed;

    /**
     * @param \MiBo\Properties\Contracts\Unit $unit
     *
     * @return \MiBo\Properties\Contracts\Property<TUnit>
     */
    public function convertToUnit(Unit $unit): Property;
}
