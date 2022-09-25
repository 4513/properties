<?php

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Kilo
 *
 *  Decimal unit prefix in the metric system denoting multiplication
 * by one thousand (10^3).
 *
 *  It is used in the Internation System of Units, where it has
 * the symbol 'k', in lower case.
 *
 *  The prefix kilo is derived from the Greek word 'χίλιοι',
 * meaning 'thousand'.
 *
 *  In 19th century English it was sometimes spelled chilio, in line
 * with a puristic opinion by Thomas Young. As an opponent of suggestion
 * to introduce the metric system in Britain, he qualified the
 * nomenclature adopted in France as barbarous.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Kilo
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
        return "k" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**3 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "kilo" . $this->contractGetName();
    }
}
