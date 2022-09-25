<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Hecto;

/**
 * Class HectoGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class HectoGram extends Gram
{
    use Hecto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
