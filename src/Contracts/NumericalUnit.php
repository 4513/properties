<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Interface NumericalUnit
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface NumericalUnit extends Unit
{
    /**
     * Get multiplier for unit.
     *
     * @return int Multiplier for unit.
     */
    public function getMultiplier(): int;
}
