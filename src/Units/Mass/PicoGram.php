<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Pico;

/**
 * Class PicoGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PicoGram extends Gram
{
    use Pico;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
