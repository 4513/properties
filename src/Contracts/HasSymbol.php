<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Trait HasSymbol
 *
 * @package MiBo\Properties\Contracts
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait HasSymbol
{
    /**
     * Returns the unit's symbol (e.g. 'm' for meter, or '$' for the US dollar).
     *
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }
}
