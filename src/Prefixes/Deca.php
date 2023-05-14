<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Deca
 *
 *  Decimal unit prefix in the metric system denoting a factor
 * of ten.
 *
 * The term is derived from the Greek 'déka', meaning 'ten'.
 *
 *  The prefix was a part of the original metric system in 1795.
 * It is not very common usage, although the decapascal is
 * occasionally used by audiologists. The decanewton is also
 * encountered occasionally, probably because it is an SI
 * approximation of the kilogram-force. Its use is more common in
 * Central Europe. In German, Polish, Czech, Slovak, and Hungarian,
 * deka (or deko) is common, and used in self-standing form,
 * always meaning decagram. A runway number typically indicates its
 * magnetic azimuth in decadegrees.
 *
 *  Before the symbol as an SI prefix was standardized as da with the
 * introduction of the Internal System of Units in 1960, various other
 * symbols were more common, such as dk, D, and Da. For syntactical
 * reasons, the HP 48, 49, 50 series, as well as the HP 39gll and Prime
 * calculators use the unit prefix D.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Deca
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
        return "da";
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
        return 1;
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
        return "deca";
    }
}
