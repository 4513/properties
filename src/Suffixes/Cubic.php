<?php

declare(strict_types=1);

namespace MiBo\Properties\Suffixes;

use MiBo\Properties\Contracts\HasMultiplier;
use MiBo\Properties\Contracts\HasName;
use MiBo\Properties\Contracts\HasSymbol;

/**
 * Trait Cubic
 *
 * @package MiBo\Properties\Suffixes
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait Cubic
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
        return $this->contractGetSymbol() . "^3";
    }

    /**
     * @inheritdoc
     */
    public function getMultiplier(): float|int
    {
        return $this->contractGetMultiplier()**3;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "cubic " . $this->contractGetName();
    }
}
