<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

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
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Giga
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
        return "G" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**9 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "giga" . $this->contractGetName();
    }
}
