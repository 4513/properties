<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Trait IsImperial
 *
 * @package MiBo\Properties\Contracts
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait IsImperial
{
    /**
     * @inheritdoc
     */
    public function isImperial(): bool
    {
        return true;
    }
}
