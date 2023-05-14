<?php

declare(strict_types = 1);

namespace MiBo\Properties;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class Length
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Length extends NumericalProperty
{
    use InternationSystemProperty;

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
    public static function getQuantityClassName(): string
    {
        return Quantities\Length::class;
    }
}
