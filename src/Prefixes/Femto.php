<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

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
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Femto
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
        return "f";
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
        return -15;
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
        return "femto";
    }
}
