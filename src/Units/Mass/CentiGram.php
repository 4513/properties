<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Centi;

/**
 * Class CentiGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class CentiGram extends Gram
{
    use Centi;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
