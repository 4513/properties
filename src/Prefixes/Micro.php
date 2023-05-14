<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

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
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Micro
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "μ";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): int
    {
        return -6;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "micro";
    }
}
