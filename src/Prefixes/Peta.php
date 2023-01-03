<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Peta
 *
 *  Decimal unit prefix in the metric system denoting multiplication by
 * one quadrillion, or 10^15.
 *
 *  It was adopted as an SI prefix in the International System of Units
 * in 1975, and has the symbol 'P'.
 *
 *  Peta is derived from the ancient Greek 'πέντε' meaning 'five'.
 * It denotes the fifth power of 1000. It is similar to the prefix penta,
 * but without the letter 'n'.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Peta
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
        return "P" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**15 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "peta" . $this->contractGetName();
    }
}
