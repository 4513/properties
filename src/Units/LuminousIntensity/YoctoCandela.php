<?php

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Yocto;

/**
 * Class YoctoCandela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class YoctoCandela extends Candela
{
    use Yocto;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
