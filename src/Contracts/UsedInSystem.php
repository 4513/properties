<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Interface UsedInSystem
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
interface UsedInSystem
{
    /**
     * Whether the unit is used in International System of Units (SI).
     *
     * @return bool
     */
    public function isSI(): bool;

    /**
     * Whether the unit is used in Imperial system.
     *
     * @return bool
     */
    public function isImperial(): bool;
}
