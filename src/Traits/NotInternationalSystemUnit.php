<?php

declare(strict_types=1);

namespace MiBo\Properties\Traits;

/**
 * Trait NotInternationalSystemUnit
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait NotInternationalSystemUnit
{
    public function isSI(): bool
    {
        return false;
    }
}
