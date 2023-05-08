<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

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
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Deca
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "da";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): float|int
    {
        return 10 ** 1;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "deca";
    }
}
