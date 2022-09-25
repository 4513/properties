<?php

namespace MiBo\Properties\Contracts;

/**
 * Interface Quantity
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
interface Quantity
{
    /**
     * @return \MiBo\Properties\Contracts\Unit
     */
    public function getDefaultUnit(): Unit;

    public function getSymbol(): string;
}
