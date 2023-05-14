<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

/**
 * Trait Yotta
 *
 *  The largest decimal unit prefix in the metric system, denoting a factor of 10^24,
 * or one septillion. It has a symbol 'Y'.
 *
 *  The prefix name is derived from the Laton 'octo' or the Ancient Greek 'ὀκτώ', meaning
 * eight, because it is equal to 1000^8.
 *
 * It was added as an SI prefix to the International System of Units (SI) in 1991.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Yotta
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
        return "Y";
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
        return 24;
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
        return "yotta";
    }
}
