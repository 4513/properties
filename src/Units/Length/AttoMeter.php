<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Atto;

/**
 * Class AttoMeter
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class AttoMeter extends Meter
{
    use Atto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
