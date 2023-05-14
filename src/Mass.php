<?php

declare(strict_types = 1);

namespace MiBo\Properties;

use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class Mass
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Mass extends NumericalProperty
{
    use InternationSystemProperty;

    /**
     * @inheritDoc
     *
     * @return class-string<\MiBo\Properties\Quantities\Time>
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\Mass::class;
    }

    public static function getDefaultISUnit(): string
    {
        return "Gram";
    }
}
