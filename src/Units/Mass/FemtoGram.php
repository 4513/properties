<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Femto;

/**
 * Class FemtoGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class FemtoGram extends Gram
{
    use Femto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
