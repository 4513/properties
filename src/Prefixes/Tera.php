<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Tera
 *
 *  Unix Prefix in the metric system denoting multiplication by
 * one trillion, or 10^12.
 *
 * It has the symbol 'T'.
 *
 *  Tera is derived from the Greek word 'τέρας', meaning 'monster'; also
 * it resembles 'tetra', meaning 'four' but with the middle letter removed
 * as it is the fourth power of 1000. The unit prefix was confirmed for
 * use in the Internation System of Units (SI) in 1960.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Tera
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
        return "T";
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
        return 12;
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
        return "tera";
    }
}
