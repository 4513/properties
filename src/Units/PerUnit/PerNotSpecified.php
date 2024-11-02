<?php

declare(strict_types=1);

namespace MiBo\Properties\Units\PerUnit;

use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Quantities\PerUnit;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\UnitHelper;
use ValueError;

/**
 * Class PerNotSpecified
 *
 * @package MiBo\Properties\Units\PerUnit
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PerNotSpecified implements NumericalUnit
{
    use NotInternationalSystemUnit;
    use NotImperialUnit;
    use NotMetricUnit;
    use NotAstronomicalUnit;
    use NotUSCustomaryUnit;
    use NotEnglishUnit;
    use UnitHelper {
        is as contractIs;
    }
    use NotAcceptedBySIUnit;

    protected string $name = "{dividend} per {divisorValue}{divisor}";

    protected string $symbol = "{dividend}/{divisorValue}{divisor}";

    protected int|float $divisorMultiplier = 1;

    protected NumericalUnit $dividend;

    protected NumericalUnit $divisor;

    public function __construct(NumericalUnit $dividend, NumericalUnit $divisor)
    {
        $this->dividend = $dividend;
        $this->divisor  = $divisor;
    }

    /**
     * @inheritDoc
     *
     * @param \MiBo\Properties\Contracts\NumericalUnit|null $dividend
     * @param \MiBo\Properties\Contracts\NumericalUnit|null $divisor
     *
     * @return ($dividend is null ? never : ($divisor is null ? never : static))
     */
    public static function get(NumericalUnit $dividend = null, NumericalUnit $divisor = null): static
    {
        if ($dividend === null || $divisor === null) {
            throw new ValueError("This unit requires both, dividend and divisor to be present.");
        }

        // @phpstan-ignore-next-line accessing offset on object
        if (empty(self::$instances[static::class][$dividend::class . "-" . $divisor::class])) {
            /** @phpstan-ignore-next-line static construct */
            self::$instances[static::class][$dividend::class . "-" . $divisor::class] = new static(
                $dividend,
                $divisor
            );
        }

        /** @phpstan-ignore-next-line */
        return self::$instances[static::class][$dividend::class . "-" . $divisor::class];
    }

    /**
     * Dividend in the unit.
     *
     * @return \MiBo\Properties\Contracts\NumericalUnit
     */
    public function getDividend(): NumericalUnit
    {
        return $this->dividend;
    }

    /**
     * Divisor in the unit.
     *
     * @return \MiBo\Properties\Contracts\NumericalUnit
     */
    public function getDivisor(): NumericalUnit
    {
        return $this->divisor;
    }

    /**
     * Set the value of divisorMultiplier.
     *
     * @param float|int $divisorMultiplier
     */
    public function setDivisorMultiplier(float|int $divisorMultiplier): void
    {
        $this->divisorMultiplier = $divisorMultiplier;
    }

    /**
     * Get the value of divisorMultiplier.
     *
     * @return float|int
     */
    public function getDivisorMultiplier(): float|int
    {
        return $this->divisorMultiplier;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return str_replace(
            [
                "{dividend}",
                "{divisorValue}",
                "{divisor}",
            ],
            [
                $this->dividend->getName(),
                $this->divisorMultiplier === 1 || $this->divisorMultiplier === 1.0 ?
                    "" :
                    $this->divisorMultiplier . " ",
                $this->divisor->getName(),
            ],
            $this->name
        );
    }

    /**
     * @inheritDoc
     */
    public function getSymbol(): string
    {
        return str_replace(
            [
                "{dividend}",
                "{divisorValue}",
                "{divisor}",
            ],
            [
                $this->dividend->getSymbol(),
                $this->divisorMultiplier === 1 || $this->divisorMultiplier === 1.0 ?
                    "" :
                    $this->divisorMultiplier . " ",
                $this->divisor->getSymbol(),
            ],
            $this->symbol
        );
    }

    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return PerUnit::class;
    }

    /**
     * @inheritDoc
     */
    public function is(Unit $unit): bool
    {
        return $this->contractIs($unit) &&
            $unit instanceof self &&
            $this->dividend->is($unit->getDividend()) &&
            $this->divisor->is($unit->getDivisor());
    }
}
