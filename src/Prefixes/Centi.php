<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Centi
 *
 *  Unit prefix in the metric system denoting a factor
 * of one hundredth.
 *
 *  Proposed in 1793, and adopted in 1795, the prefix
 * comes from Latin 'centum', meaning 'hundred'.
 *
 *  Since 1960, the prefix is part of the Internation
 * System of Units (SI).
 *
 *  It is mainly used in combination with the unit metre
 * to form centimetre, a common unit of length.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Centi
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
        return "c";
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
        return -2;
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
        return "centi";
    }
}
