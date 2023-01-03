<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Deci
 *
 *  Decimal unit prefix in the metric system denoting a factor
 * of one tenth.
 *
 *  Proposed in 1793, and adopted in 1795, the prefix comes from
 * the Latin 'decimus', meaning 'tenth'.
 *
 *  A frequent use of the prefix is in the unit deciliter (dl),
 * common in food recipes; many European homes have a deciliter
 * measure for flour, water, etc. A common measure in engineering
 * is the unit decibel for measuring ratios of power and
 * root-power quantities, such as sound level and electrical
 * amplification.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Deci
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
        return "d" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**-1 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "deci" . $this->contractGetName();
    }
}
