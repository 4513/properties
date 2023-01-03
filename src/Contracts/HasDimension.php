<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Class HasDimension
 *
 * @package MiBo\Properties\Contracts
 */
trait HasDimension
{
    public function hasDimension(): bool
    {
        return true;
    }
}
