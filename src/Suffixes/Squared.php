<?php

declare(strict_types=1);

namespace MiBo\Properties\Suffixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Squared
 *
 * @package MiBo\Properties\Suffixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Squared
{
    /**
     * Returns symbol suffix.
     *
     * @see \MiBo\Properties\Traits\UnitHelper::getSymbol
     *
     * @return string
     */
    public function getSymbolSuffix(): string
    {
        return "²";
    }

    /**
     * Returns name suffix.
     *
     * @see \MiBo\Properties\Traits\UnitHelper::getName
     *
     * @return string
     */
    public function getNameSuffix(): string
    {
        return "square";
    }
}
