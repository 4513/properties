<?php

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Pico;

/**
 * Class PicoCandela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class PicoCandela extends Candela
{
    use Pico;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
