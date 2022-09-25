<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deca;

/**
 * Class DecaGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DecaGram extends Gram
{
    use Deca;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
