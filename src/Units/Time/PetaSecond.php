<?php

namespace MiBo\Properties\Units\Time;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Peta;

/**
 * Class PetaSecond
 *
 * @package MiBo\Properties\Units\Time
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PetaSecond extends Second
{
    use Peta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
