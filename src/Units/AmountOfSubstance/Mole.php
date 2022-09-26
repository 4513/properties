<?php

namespace MiBo\Properties\Units\AmountOfSubstance;

use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\AmountOfSubstance;

/**
 * Class Mole
 *
 * @package MiBo\Properties\Units\AmountOfSubstance
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Mole extends NumericalUnit
{
    use IsSI;

    /** @inheritdoc */
    protected string $name = "mole";

    /** @inheritdoc */
    protected string $symbol = "mol";

    protected const QUANTITY = AmountOfSubstance::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
