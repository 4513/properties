<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Exa;

/**
 * Class ExaGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ExaGram extends Gram
{
    use Exa;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
