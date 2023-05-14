<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class AmountOfSubstance
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class AmountOfSubstance extends NumericalProperty
{
    use InternationSystemProperty;

    /**
     * @inheritDoc
     *
     * @return class-string<\MiBo\Properties\Quantities\AmountOfSubstance>
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\AmountOfSubstance::class;
    }

    public static function getDefaultISUnit(): string
    {
        return "Mole";
    }
}
