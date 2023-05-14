<?php

declare(strict_types = 1);

namespace MiBo\Properties;

use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class ThermodynamicTemperature
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class ThermodynamicTemperature extends NumericalProperty
{
    use InternationSystemProperty;

    /**
     * @inheritDoc
     *
     * @return class-string<\MiBo\Properties\Quantities\ThermodynamicTemperature>
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\ThermodynamicTemperature::class;
    }

    public static function getDefaultISUnit(): string
    {
        return "Kelvin";
    }
}
