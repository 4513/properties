<?php

declare(strict_types = 1);

namespace MiBo\Properties\Traits;

use MiBo\Properties\Quantities\ElectricCurrent;

/**
 * Trait UnitForElectricCurrent
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait UnitForElectricCurrent
{
    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return ElectricCurrent::class;
    }
}
