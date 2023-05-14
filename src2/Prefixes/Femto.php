<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Femto
 *
 * Unit prefix in the metric system denoting a factor of 10^-15.
 *
 * It was added to the International System of Units (SI) in 1964.
 *
 *  It is derived from the Danish word 'femten', meaning 'fifteen',
 * which has a vaguely similar spelling to 'fermi', which was
 * introduced earlier to mean a femtometer.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Femto
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "f";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): int
    {
        return -15;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "femto";
    }
}
