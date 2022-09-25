<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Peta;

/**
 * Class PetaMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PetaMeter extends Meter
{
    use Peta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
