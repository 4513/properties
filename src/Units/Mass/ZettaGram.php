<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zetta;

/**
 * Class ZettaGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZettaGram extends Gram
{
    use Zetta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
