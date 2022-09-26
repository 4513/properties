<?php

namespace MiBo\Properties\Contracts;

/**
 * Trait HasMultiplier
 *
 * @package MiBo\Properties\Contracts
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait HasMultiplier
{
    /** @var int|float  */
    protected int|float $multiplier = 1;

    /**
     *  Returns the multiplier, that if applied, user gets the main unit of that velocity.
     * For example, millimeter has a multiplier 10^-3, meaning, a millimeter * 10^-3 = value in meters.
     *
     * @param float|int $value
     *
     * @return float|int
     */
    public function getMultiplier(float|int $value): float|int
    {
        return $value * $this->multiplier;
    }
}
