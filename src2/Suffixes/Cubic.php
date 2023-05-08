<?php

declare(strict_types=1);

namespace MiBo\Properties\Suffixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Cubic
 *
 * @package MiBo\Properties\Suffixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Cubic
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
        return $this->contractGetSymbol() . "³";
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return $this->contractGetMultiplier() ** 3;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "cubic " . $this->contractGetName();
    }
}
