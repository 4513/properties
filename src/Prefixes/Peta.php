<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Peta
 *
 *  Decimal unit prefix in the metric system denoting multiplication by
 * one quadrillion, or 10^15.
 *
 *  It was adopted as an SI prefix in the International System of Units
 * in 1975, and has the symbol 'P'.
 *
 *  Peta is derived from the ancient Greek 'πέντε' meaning 'five'.
 * It denotes the fifth power of 1000. It is similar to the prefix penta,
 * but without the letter 'n'.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Peta
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
        return "P";
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
        return 15;
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
        return "peta";
    }
}
