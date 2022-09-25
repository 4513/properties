<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Tera;

/**
 * Class TeraGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class TeraGram extends Gram
{
    use Tera;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
