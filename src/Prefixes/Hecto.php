<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Hecto
 *
 *  Decimal unit prefix in the metric system denoting a factor
 * of one hundred.
 *
 *  It was adopted as a multiplier in 1795, and comes from the Greek
 * 'ἑκατόν', meaning 'hundred'.
 *
 *  In 19th century English it was sometimes spelled 'hecato', in line
 * with a puristic opinion by Thomas Young.
 *
 *  Its unit symbol as an SI prefix in the Internation System of Unit
 * (SI) is the lower case latter 'h'.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Hecto
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
        return "h" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**2 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "hecto" . $this->contractGetName();
    }
}
