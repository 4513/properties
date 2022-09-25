<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Deci;

/**
 * Class DeciGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class DeciGram extends Gram
{
    use Deci;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
