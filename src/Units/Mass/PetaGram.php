<?php

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Peta;

/**
 * Class PetaGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PetaGram extends Gram
{
    use Peta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
