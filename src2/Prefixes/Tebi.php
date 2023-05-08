<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Tebi
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Tebi
{
    use UnitHelper {
        getSymbol as contractGetSymbol;
        getMultiplier as contractGetMultiplier;
        getName as contractGetName;
    }

    /**
     * @inheritdoc
     */
    public function getSymbol(): string
    {
        return "Ti" . $this->contractGetSymbol();
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return 2 ** 40 * $this->contractGetMultiplier();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "tebi" . $this->contractGetName();
    }
}
