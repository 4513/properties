<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Mega
 *
 *  Unit prefix in metric systems of units denoting a factor of
 * one million (10^6).
 *
 * It has the unit symbol 'M'.
 *
 *  It was confirmed for used in the Internation System of Units (SI)
 * in 1960.
 *
 * Mega comes from ancient Greek: 'μέγας' ('great').
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Mega
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "M";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): int
    {
        return 6;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "mega";
    }
}
