<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Interface Derived
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
interface Derived extends Quantity
{
    public static function getRequiredQuantities(): array;

    public static function getEquations(): array;
}
