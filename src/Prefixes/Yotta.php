<?php

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Yotta
 *
 *  The largest decimal unit prefix in the metric system, denoting a factor of 10^24,
 * or one septillion. It has a symbol 'Y'.
 *
 *  The prefix name is derived from the Laton 'octo' or the Ancient Greek 'ὀκτώ', meaning
 * eight, because it is equal to 1000^8.
 *
 * It was added as an SI prefix to the International System of Units (SI) in 1991.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Yotta
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
        return "Y" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**24 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "yotta" . $this->contractGetName();
    }
}
