<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Giga
 *
 *  Unit prefix in the metric system denoting a factor of a short-scale
 * billion or long-scale milliard (10^9).
 *
 * It has the symbol 'G'.
 *
 *  Giga is derived from the Greek word 'γίγας', meaning 'giant'.
 * The Oxford English Dictionary reports the earliest written use of giga
 * in this sense to be in the Reports of the IUPAC 14th Conference in 1947:
 * > "The following prefixes to abbreviations for the names of units should
 * >  be used: G giga 10^9x."
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Giga
{
    use UnitHelper {
        getSymbol as contractGetSymbol;
        getMultiplier as contractGetMultiplier;
        getName as contractGetName;
    }

    /**
     * @inheritdoc
     */
    public function getSymbol(): string
    {
        return "G" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10 ** 9 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "giga" . $this->contractGetName();
    }
}
