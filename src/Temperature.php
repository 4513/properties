<?php

namespace MiBo\Properties;

use MiBo\Properties\Quantities\Temperature as Quantity;

/**
 * Class Temperature
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Temperature extends Property
{
    /**
     * @inheritdoc
     */
    public function getQuantity(): string
    {
        return Quantity::class;
    }
}
