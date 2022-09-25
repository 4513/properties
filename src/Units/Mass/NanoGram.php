<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Nano;

/**
 * Class NanoGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class NanoGram extends Gram
{
    use Nano;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
