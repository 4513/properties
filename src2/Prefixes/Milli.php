<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Milli
 *
 *  Unit prefix in the metric system denoting a factor
 * of one thousandth (10^-3).
 *
 *  Proposed in 1793, and adopted in 1795, the prefix
 * comes from Latin 'mille', meaning 'one thousand'.
 *
 *  Since 1960, the prefix is part of the Internation
 * System of Units (SI).
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Milli
{
    use UnitHelper {
        getMultiplier as contractGetMultiplier;
    }

    /**
     * @see \MiBo\Properties\Traits\UnitHelper::getSymbol
     *
     * @return string
     */
    protected function getSymbolPrefix(): string
    {
        return "m";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): float|int
    {
        return 10 ** -3;
    }

    /**
     * @see \MiBo\Properties\Traits\UnitHelper::getName
     *
     * @return string
     */
    protected function getNamePrefix(): string
    {
        return "milli";
    }
}
