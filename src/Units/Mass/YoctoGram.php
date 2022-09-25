<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yocto;

/**
 * Class YoctoGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class YoctoGram extends Gram
{
    use Yocto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
