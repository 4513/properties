<?php

namespace MiBo\Properties\Units\Length;

use MiBo\Properties\Contracts\IsImperial;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\Length;

/**
 * Class Foot
 *
 *  The foot, standard symbol 'ft', is a unit of length in British
 * imperial and United States customary systems of measurement.
 *
 * The prime symbol '′', is a customarily used alternative symbol.
 *
 *  Since the International Yard and Pound Agreement of 1959, one
 * foot is defined as 0.3048 exactly. In both customary and imperial
 * units, one foot comprises 12 inches and one yard comprises three
 * feet.
 *
 *  Historically the "foot" was a part of many local systems of units,
 * including the Greek, Roman, Chinese, French, and English systems.
 * It varied in length from country to country, from city to city,
 * and sometimes from trade to trade. Its length was usually between
 * 2500 mm and 335 mm and was generally, but not always, subdivided
 * into 12 inches or 16 digits.
 *
 *  The United States is the only industrialized nation that uses the
 * international foot and the survey foot (a customary unit of length)
 * in preference to the meter in its commercial, engineering, and
 * standards activities. The foot is legally recognized in the United
 * Kingdom; road signs must use imperial units, while its usage is
 * widespread among the British public as a measurement of height. The
 * foot is recognized as an alternative expression of length in Canada
 * officially defined as a unit derived from the meter although both
 * the U.K. and Canada have partially metricated their units of
 * measurement. The measurement of altitude in international aviation
 * is one of the few areas, where the foot is used outside the English-
 * speaking world.
 *
 *  The length of the international foot corresponds to a human foot
 * with shoe size of 13 (UK), 14 (US male), 15.5 (US female) or
 * 48 (EU sizing).
 *
 * @package MiBo\Properties\Units\Length
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Foot extends Unit
{
    use IsImperial;

    /** @inheritdoc */
    protected string $name = "foot";

    /** @inheritdoc */
    protected string $symbol = "ft";

    /** @inheritdoc */
    protected int|float $multiplier = 3048*(10**-4);

    protected const QUANTITY = Length::class;

    /** @inheritdoc */
    protected static ?Unit $instance = null;
}
