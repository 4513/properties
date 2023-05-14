<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Atto
 *
 * Unit prefix in the metric system denoting a factor of 10^-18.
 *
 *  The unit multiple was adopted at the 12th General Conference
 * on Weights and Measures (CGPM) in Resolution 8. It derived from
 * the Danish word 'atten', meaning 'eighteen'.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Atto
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
        return "a";
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
        return -18;
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
        return "atto";
    }
}
