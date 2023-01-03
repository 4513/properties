<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Contracts\Unit;

/**
 * Class Are
 *
 * @package MiBo\Properties\Units\Area
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class Are extends SquareDecaMeter
{
    /** @inheritdoc */
    protected string $name = "are";

    /** @inheritdoc */
    protected string $symbol = "a";

    protected int|float $multiplier = 10**2;

    /** @inheritdoc */
    protected static ?Unit $instance = null;

    /** @inheritdoc */
    public function isSI(): bool
    {
        return false;
    }

    /** @inheritdoc */
    public function getName(): string
    {
        return $this->name;
    }

    /** @inheritdoc */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return float|int
     */
    public function getMultiplier(): float|int
    {
        return $this->multiplier;
    }
}
