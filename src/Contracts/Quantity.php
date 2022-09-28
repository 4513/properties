<?php

namespace MiBo\Properties\Contracts;

use MiBo\Properties\Property;

/**
 * Interface Quantity
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
interface Quantity
{
    /**
     * @return \MiBo\Properties\Contracts\Unit
     */
    public static function getDefaultUnit(): Unit;

    public static function getSymbol(): string;

    public static function getDefaultProperty(): string;
}
