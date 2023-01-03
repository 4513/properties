<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Micro
 *
 *  Unit prefix in the metric system denoting a factor
 * of 10^-6.
 *
 *  Confirmed in 1960, the prefix comes from the Greek
 * 'μικρός', meaning 'small'.
 *
 *  The symbol for the prefix is the Greek letter 'μ'. It
 * is the only SI prefix which uses a character not from
 * the Latin alphabet. "mc" is commonly used as a prefix
 * when the character "μ" is not available; for example,
 * "mcg" commonly denotes a microgram. This may be ambiguous
 * in rare circumstances in that mcg could also be read as
 * micrigram, i.e. 10^-14 g; however the prefix micri is not
 * standard, nor widely known, and is considered obsolete.
 * The letter 'u', instead of 'μ', was allowed by an ISO
 * document, but that document has been withdrawn.
 *
 * @package MiBo\Properties\Prefixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Micro
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
        return "μ" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 10**-6 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "micro" . $this->contractGetName();
    }
}
