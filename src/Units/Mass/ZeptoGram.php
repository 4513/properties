<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zepto;

/**
 * Class ZeptoGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZeptoGram extends Gram
{
    use Zepto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
