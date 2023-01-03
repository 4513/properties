<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Trait IsSI
 *
 * @package MiBo\Properties\Contracts
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait IsSI
{
    /**
     * @inheritdoc
     */
    public function isSI(): bool
    {
        return true;
    }
}
