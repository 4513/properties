<?php

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Centi
 *
 *  Unit prefix in the metric system denoting a factor
 * of one hundredth.
 *
 *  Proposed in 1793, and adopted in 1795, the prefix
 * comes from Latin 'centum', meaning 'hundred'.
 *
 *  Since 1960, the prefix is part of the Internation
 * System of Units (SI).
 *
 *  It is mainly used in combination with the unit metre
 * to form centimetre, a common unit of length.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Centi
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
        return "c" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**-2 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "centi" . $this->contractGetName();
    }
}
