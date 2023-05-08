<?php

declare(strict_types=1);

namespace MiBo\Properties\Suffixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Squared
 *
 * @package MiBo\Properties\Suffixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Squared
{
    use UnitHelper {
        UnitHelper::getSymbol as contractGetSymbol;
        UnitHelper::getMultiplier as contractGetMultiplier;
//        UnitHelper::getName as contractGetName;
    }

    /**
     * @inheritdoc
     */
    public function getSymbol(): string
    {
        return $this->contractGetSymbol() . "²";
    }

    /**
     * @inheritdoc
     */
    public function getMultiplierSuffix(): float|int
    {
        return 2;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "square " . parent::getName();
    }
}
