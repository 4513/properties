<?php

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Zetta;

/**
 * Class ZettaCandela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ZettaCandela extends Candela
{
    use Zetta;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
