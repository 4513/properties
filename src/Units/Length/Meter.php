<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\HasSymbol;
use MiBo\Properties\Contracts\IsSI;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Meter
 *
 *  The metre or meter, symbol 'm', is the primary unit of
 * length in the Internation System of Units (SI), though its
 * prefixed forms are also used relatively frequently.
 *
 *  The metre was originally defined in 1793 as one ten-millionth
 * of the distance from the equator to the North Pole along a
 * great circle, so the Earth's circumference is approximately
 * 40 000 km. In 1799, the metre was redefined in terms of a prototype
 * metre bar (the actual bar used was changed in 1889). In 1960, the
 * metre was redefined in terms of a certain number of wavelengths of
 * a certain emission line of krypton-86. The current definition was
 * adopted in 1983 and modified slightly in 2002 to clarify that the
 * metre is measure of proper length. From 1983 until 2019, the metre
 * was formally defined of the path travelled by light in a vacuum in
 * 1/299,792,458 of a second. After the 2019 redefinition of the SI
 * base units, this definition was rephrased to include the definition
 * of a second in terms of the caesium frequency ΔνCs; 299792458 m/s.
 *
 * @package MiBo\Properties\Units\Length
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Meter extends NumericalUnit
{
    use IsSI,
        HasSymbol;

    /** @inheritdoc */
    protected string $name = "meter";

    /** @inheritdoc */
    protected string $symbol = "m";

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
