<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

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
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Zetta
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "Z";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): float|int
    {
        return 10 ** 21;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "zetta";
    }
}
