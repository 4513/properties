<?php

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Pico
 *
 *  Unit prefix in the metric system denoting a factor of one
 * trillionth in the short scale and one billionth in the long
 * scale; that is 10^-12,
 *
 *  Derived from the Spanish word 'pico', meaning 'peak'/'beak',
 * pico is one of the original twelve prefixes defined in 1960
 * when the International System of Units (SI) was established.
 *
 *  Atomic radii range from 28 picometers (pm) for helium to
 * 260 pm for caesium. One picolight-year (ply) is about nine
 * kilometers (six miles).
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Pico
{
    use HasSymbol {
        HasSymbol::getSymbol as contractGetSymbol;
    }

    use HasMultiplier {
        HasMultiplier::getMultiplier as contractGetMultiplier;
    }

    use HasName {
        HasName::getName as contractGetName;
    }

    /**
     * @inheritdoc
     */
    public function getSymbol(): string
    {
        return "p" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**-12 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "pico" . $this->contractGetName();
    }
}
