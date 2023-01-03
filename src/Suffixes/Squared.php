<?php

declare(strict_types=1);

namespace MiBo\Properties\Suffixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Squared
 *
 * @package MiBo\Properties\Suffixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Squared
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
        return $this->contractGetSymbol() . "^2";
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return $this->contractGetMultiplier()**2;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "square " . $this->contractGetName();
    }
}
