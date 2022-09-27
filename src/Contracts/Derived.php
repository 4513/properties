<?php

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
    public function getRequiredQuantities(): array;
}
