<?php

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Exa;

/**
 * Class ExaCandela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class ExaCandela extends Candela
{
    use Exa;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
