<?php

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Yocto
 *
 * Unit prefix in the metric system denoting a factor of 10^-24.
 *
 * It was adopted in 1991 by the General Conference on Weights
 * and Measures.
 *
 *  It Comes from the Laton 'octo' or the ancient Greek 'οκτώ',
 * meaning 'eight', because it is equal to 1000^-8.
 *
 * Yocto is the smallest official SI prefix.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Yocto
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
        return "y" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**-24 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "yocto" . $this->contractGetName();
    }
}
