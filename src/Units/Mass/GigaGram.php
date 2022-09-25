<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Giga;

/**
 * Class GigaGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class GigaGram extends Gram
{
    use Giga;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
