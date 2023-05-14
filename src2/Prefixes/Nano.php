<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Nano
 *
 * Unit prefix meaning "one billionth".
 *
 *  Used primarily with the metric system, this prefix denotes
 * a factor of 10^-9.
 *
 *  It is frequently encountered in science and electronics for
 * prefixing units of time and length.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Nano
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "n";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): int
    {
        return -9;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "nano";
    }
}
