<?php

namespace MiBo\Properties\Units\LuminousIntensity;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Prefixes\Tera;

/**
 * Class TeraCandela
 *
 * @package MiBo\Properties\Units\LuminousIntensity
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class TeraCandela extends Candela
{
    use Tera;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
