<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Mega;

/**
 * Class MegaGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class MegaGram extends Gram
{
    use Mega;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
