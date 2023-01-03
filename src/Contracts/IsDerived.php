<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Class IsDerived
 *
 * @package MiBo\Properties\Contracts
 */
trait IsDerived
{
    /**
     * @return \MiBo\Properties\Contracts\Derivable[]
     */
    public static function getRequiredQuantities(): array
    {
        return static::$requiredQuantities;
    }
}
