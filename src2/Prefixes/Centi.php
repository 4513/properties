<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

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
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "c";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): float|int
    {
        return 10 ** -2;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "centi";
    }
}