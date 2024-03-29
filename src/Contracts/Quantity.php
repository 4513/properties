<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Interface Quantity
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface Quantity
{
    /**
     * Returns dimension symbol of the Quantity.
     *
     * @return string|null Dimension symbol of the Quantity.
     */
    public static function getDimensionSymbol(): ?string;

    /**
     * Change a default Unit for the Quantity.
     *
     * @param \MiBo\Properties\Contracts\Unit $unit Unit to be used.
     *
     * @return \MiBo\Properties\Contracts\Unit Previous Unit.
     */
    public static function setDefaultUnit(Unit $unit): Unit;

    /**
     * Currently used Unit by the Quantity.
     *
     * @return \MiBo\Properties\Contracts\Unit Default Unit.
     */
    public static function getDefaultUnit(): Unit;

    /**
     * Change a default Property for the Quantity.
     *
     * @return class-string<\MiBo\Properties\Contracts\NumericalProperty> The class name of the Property.
     */
    public static function getDefaultProperty(): string;
}
