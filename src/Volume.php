<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class Volume
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Volume extends NumericalProperty
{
    use InternationSystemProperty {
        getClassToCreate as contractGetClassToCreate;
    }

    /**
     * @inheritDoc
     *
     * @return class-string<\MiBo\Properties\Quantities\Volume>
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\Volume::class;
    }

    public static function getDefaultISUnit(): string
    {
        return "Meter";
    }

    protected static function getClassToCreate(string $prefix): string
    {
        return self::contractGetClassToCreate("Cubic" . $prefix);
    }
}
