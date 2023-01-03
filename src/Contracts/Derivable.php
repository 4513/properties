<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Class Derivable
 *
 * @package MiBo\Properties\Contracts
 */
interface Derivable extends Quantity
{
    public static function getEquations(): array;
}
