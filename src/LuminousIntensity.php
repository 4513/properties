<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class LuminousIntensity
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class LuminousIntensity extends NumericalProperty
{
    use InternationSystemProperty;

    /**
     * @inheritDoc
     */
    public static function getDefaultISUnit(): string
    {
        return "Candela";
    }

    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\LuminousIntensity::class;
    }
}
