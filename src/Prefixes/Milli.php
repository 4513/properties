<?php

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Milli
 *
 *  Unit prefix in the metric system denoting a factor
 * of one thousandth (10^-3).
 *
 *  Proposed in 1793, and adopted in 1795, the prefix
 * comes from Latin 'mille', meaning 'one thousand'.
 *
 *  Since 1960, the prefix is part of the Internation
 * System of Units (SI).
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Milli
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
    public function getSymbol(): ?string
    {
        return "m" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**-3 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "milli" . $this->contractGetName();
    }
}
