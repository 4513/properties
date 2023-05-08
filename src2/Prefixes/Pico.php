<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Pico
 *
 *  Unit prefix in the metric system denoting a factor of one
 * trillionth in the short scale and one billionth in the long
 * scale; that is 10^-12,
 *
 *  Derived from the Spanish word 'pico', meaning 'peak'/'beak',
 * pico is one of the original twelve prefixes defined in 1960
 * when the International System of Units (SI) was established.
 *
 *  Atomic radii range from 28 picometers (pm) for helium to
 * 260 pm for caesium. One picolight-year (ply) is about nine
 * kilometers (six miles).
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Pico
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "p";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): float|int
    {
        return 10 ** -12;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "pico";
    }
}
