<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Exa
 *
 * Decimal Unit prefix in the metric system denoting 10^18.
 *
 *  It was added as an SI prefix to the Internation System of Units (SI) in 1975,
 * and has the unit symbol 'E'.
 *
 *  Exa comes from the ancient Greek ἕξ héx, meaning six, because it is
 * equal to 1000^6.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Exa
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
        return "E";
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
        return 18;
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
        return "exa";
    }
}
