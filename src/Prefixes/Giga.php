<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Giga
 *
 *  Unit prefix in the metric system denoting a factor of a short-scale
 * billion or long-scale milliard (10^9).
 *
 * It has the symbol 'G'.
 *
 *  Giga is derived from the Greek word 'γίγας', meaning 'giant'.
 * The Oxford English Dictionary reports the earliest written use of giga
 * in this sense to be in the Reports of the IUPAC 14th Conference in 1947:
 * > "The following prefixes to abbreviations for the names of units should
 * >  be used: G giga 10^9x."
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Giga
{
    /**
     * Returns symbol prefix.
     *
     * @see \MiBo\Properties\Traits\UnitHelper::getSymbol
     *
     * @return string
     */
    protected function getSymbolPrefix(): string
    {
        return "G";
    }

    /**
     * Returns exp size.
     *
     * @see \MiBo\Properties\Traits\UnitHelper::getMultiplier
     *
     * @return int
     */
    protected function getMultiplierPrefix(): int
    {
        return 9;
    }

    /**
     * Returns prefix.
     *
     * @see \MiBo\Properties\Traits\UnitHelper::getName
     *
     * @return string
     */
    protected function getNamePrefix(): string
    {
        return "giga";
    }
}
