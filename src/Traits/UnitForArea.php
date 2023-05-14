<?php

declare(strict_types=1);

namespace MiBo\Properties\Traits;

use MiBo\Properties\Quantities\Area;

/**
 * Trait UnitForArea
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait UnitForArea
{
    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return Area::class;
    }
}
