<?php

declare(strict_types = 1);

namespace MiBo\Properties;

use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class ElectricCurrent
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class ElectricCurrent extends NumericalProperty
{
    use InternationSystemProperty;

    /**
     * @inheritDoc
     *
     * @return class-string<\MiBo\Properties\Quantities\ElectricCurrent>
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\ElectricCurrent::class;
    }

    public static function getDefaultISUnit(): string
    {
        return "Ampere";
    }
}
