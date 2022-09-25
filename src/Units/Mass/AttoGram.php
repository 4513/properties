<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Atto;

/**
 * Class AttoGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class AttoGram extends Gram
{
    use Atto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
