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
        $current = static::getDefaultUnit();

        /** @phpstan-ignore-next-line */
        static::$unit = $unit;

        return $current;
    }

    /**
     * @inheritDoc
     */
    public static function getDefaultUnit(): Unit
    {
        /** @phpstan-ignore-next-line */
        if (static::$unit === null) {
            /** @phpstan-ignore-next-line */
            static::$unit = static::getInitialUnit();
        }

        /** @phpstan-ignore-next-line */
        return static::$unit;
    }

    abstract protected static function getInitialUnit(): Unit;
}
