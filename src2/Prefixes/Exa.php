<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

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
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Exa
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "E";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): float|int
    {
        return 10 ** 18;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "exa";
    }
}
