<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

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
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Kilo
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "k";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): float|int
    {
        return 10 ** 3;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "kilo";
    }
}
