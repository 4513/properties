<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Yocto
 *
 * Unit prefix in the metric system denoting a factor of 10^-24.
 *
 * It was adopted in 1991 by the General Conference on Weights
 * and Measures.
 *
 *  It Comes from the Laton 'octo' or the ancient Greek 'οκτώ',
 * meaning 'eight', because it is equal to 1000^-8.
 *
 * Yocto is the smallest official SI prefix.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Yocto
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
        return "y";
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
        return -24;
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
        return "yocto";
    }
}
