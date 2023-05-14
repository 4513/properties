<?php

declare(strict_types = 1);

namespace MiBo\Properties;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class Area
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Area extends NumericalProperty
{
    use InternationSystemProperty {
        getClassToCreate as contractGetClassToCreate;
    }

    /**
     * @inheritDoc
     */
    public static function getDefaultISUnit(): string
    {
        return "Meter";
    }

    /**
     * @inheritDoc
     */
    protected static function getClassToCreate(string $prefix): string
    {
        return self::contractGetClassToCreate("Square" . $prefix);
    }

    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\Area::class;
    }
}
