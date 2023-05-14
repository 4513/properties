<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Zetta
 *
 * Decimal unit prefix in the metric system denoting a factor of 10^21.
 *
 *  The prefix was added as an SI prefix to the International System of Units (SI)
 * in 1991.
 *
 * Zetta is derived from Latin numeral septem 'seven', and represents 1000^7.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Zetta
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
        return "Z";
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
        return 21;
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
        return "zetta";
    }
}
