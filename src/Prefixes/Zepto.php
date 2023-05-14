<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Zepto
 *
 * Unit prefix in the metric system denoting a factor of 10^-21.
 *
 * Adopted into the International System of Units (SI) in 1991.
 *
 *  It is derived from the Latin 'septem', 'seven', since it is
 * equal to 10000^-7.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Zepto
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
        return "z";
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
        return -21;
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
        return "zepto";
    }
}
