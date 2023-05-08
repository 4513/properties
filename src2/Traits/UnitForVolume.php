<?php

declare(strict_types = 1);

namespace MiBo\Properties\Traits;

use MiBo\Properties\Quantities\Volume;

/**
 * Trait UnitForVolume
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait UnitForVolume
{
    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return Volume::class;
    }
}
