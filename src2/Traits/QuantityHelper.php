<?php

declare(strict_types = 1);

namespace MiBo\Properties\Traits;

use MiBo\Properties\Contracts\Unit;

/**
 * Trait QuantityHelper
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait QuantityHelper
{
    private static ?Unit $unit = null;

    /**
     * @inheritDoc
     */
    public static function setDefaultUnit(Unit $unit): Unit
    {
        $current      = static::getDefaultUnit();
        static::$unit = $unit;

        return $current;
    }

    /**
     * @inheritDoc
     */
    public static function getDefaultUnit(): Unit
    {
        if (static::$unit === null) {
            static::$unit = static::getInitialUnit();
        }

        return static::$unit;
    }

    abstract protected static function getInitialUnit(): Unit;
}
