<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Yocto
 *
 * Unit prefix in the metric system denoting a factor of 10^-24.
 *
 * It was adopted in 1991 by the General Conference on Weights
 * and Measures.
 *
 *  It Comes from the Laton 'octo' or the ancient Greek 'οκτώ',
 * meaning 'eight', because it is equal to 1000^-8.
 *
 * Yocto is the smallest official SI prefix.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Yocto
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "y";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): float|int
    {
        return 10 ** -24;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "yocto";
    }
}
