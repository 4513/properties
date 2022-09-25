<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Micro;

/**
 * Class MicroGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MicroGram extends Gram
{
    use Micro;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
