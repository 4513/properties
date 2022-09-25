<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Tera;

/**
 * Class TeraMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class TeraMeter extends Meter
{
    use Tera;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
