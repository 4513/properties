<?php

declare(strict_types=1);

namespace MiBo\Properties\Traits;

use MiBo\Properties\Contracts\ComparableProperty;
use MiBo\Properties\Contracts\NumericalComparableProperty;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\NumericalProperty;

/**
 * Trait ComparesNumericalValueTrait
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait ComparesNumericalValueTrait
{
    /**
     * @inheritDoc
     */
    public function isLessThan(NumericalComparableProperty|int|float $property): bool
    {
        return $this->getValue() < ($property instanceof NumericalComparableProperty ?
            $property->convertToUnit($this->getUnit())->getValue() :
            $property
        );
    }

    /**
     * @inheritDoc
     */
    public function isNotLessThan(NumericalComparableProperty|int|float $property): bool
    {
        return !$this->isLessThan($property);
    }

    /**
     * @inheritDoc
     */
    public function isLessThanOrEqualTo(NumericalComparableProperty|int|float $property): bool
    {
        return $this->getValue() <= ($property instanceof NumericalComparableProperty ?
            $property->convertToUnit($this->getUnit())->getValue() :
            $property
        );
    }

    /**
     * @inheritDoc
     */
    public function isNotLessThanOrEqualTo(NumericalComparableProperty|int|float $property): bool
    {
        return !$this->isLessThanOrEqualTo($property);
    }

    /**
     * @inheritDoc
     */
    public function isGreaterThan(NumericalComparableProperty|int|float $property): bool
    {
        return $this->getValue() > ($property instanceof NumericalComparableProperty ?
            $property->convertToUnit($this->getUnit())->getValue() :
            $property
        );
    }

    /**
     * @inheritDoc
     */
    public function isNotGreaterThan(NumericalComparableProperty|int|float $property): bool
    {
        return !$this->isGreaterThan($property);
    }

    /**
     * @inheritDoc
     */
    public function isGreaterThanOrEqualTo(NumericalComparableProperty|int|float $property): bool
    {
        return $this->getValue() >= ($property instanceof NumericalComparableProperty ?
            $property->convertToUnit($this->getUnit())->getValue() :
            $property
        );
    }

    /**
     * @inheritDoc
     */
    public function isNotGreaterThanOrEqualTo(NumericalComparableProperty|int|float $property): bool
    {
        return !$this->isGreaterThanOrEqualTo($property);
    }

    /**
     * @inheritDoc
     */
    public function isEqualTo(NumericalComparableProperty|int|float $property): bool
    {
        return $this->getValue() === ($property instanceof NumericalComparableProperty ?
            $property->convertToUnit($this->getUnit())->getValue() :
            $property
        );
    }

    /**
     * @inheritDoc
     */
    public function isNotEqualTo(NumericalComparableProperty|int|float $property): bool
    {
        return !$this->isEqualTo($property);
    }

    /**
     * @inheritDoc
     */
    public function isBetween(
        NumericalComparableProperty|int|float $first,
        NumericalComparableProperty|int|float $second
    ): bool
    {
        return ($this->isGreaterThan($first) && $this->isLessThan($second)) ||
            ($this->isLessThan($first) && $this->isGreaterThan($second));
    }

    /**
     * @inheritDoc
     */
    public function isNotBetween(
        NumericalComparableProperty|int|float $first,
        NumericalComparableProperty|int|float $second
    ): bool
    {
        return !$this->isBetween($first, $second);
    }

    /**
     * @inheritDoc
     */
    public function isBetweenOrEqualTo(
        NumericalComparableProperty|int|float $first,
        NumericalComparableProperty|int|float $second
    ): bool
    {
        return ($this->isGreaterThanOrEqualTo($first) && $this->isLessThanOrEqualTo($second)) ||
            ($this->isLessThanOrEqualTo($first) && $this->isGreaterThanOrEqualTo($second));
    }

    /**
     * @inheritDoc
     */
    public function isNotBetweenOrEqualTo(
        NumericalComparableProperty|int|float $first,
        NumericalComparableProperty|int|float $second
    ): bool
    {
        return !$this->isBetweenOrEqualTo($first, $second);
    }

    /**
     * @inheritDoc
     */
    public function isPositive(): bool
    {
        return $this->getValue() > 0;
    }

    /**
     * @inheritDoc
     */
    public function isNotPositive(): bool
    {
        return !$this->isPositive();
    }

    /**
     * @inheritDoc
     */
    public function isNegative(): bool
    {
        return $this->getValue() < 0;
    }

    /**
     * @inheritDoc
     */
    public function isNotNegative(): bool
    {
        return !$this->isNegative();
    }

    /**
     * @inheritDoc
     */
    public function isZero(): bool
    {
        $value = $this->getValue();

        return $value === 0 || $value === 0.0;
    }

    /**
     * @inheritDoc
     */
    public function isNotZero(): bool
    {
        return !$this->isZero();
    }

    /**
     * @inheritDoc
     */
    public function isInteger(): bool
    {
        return is_int($this->getValue());
    }

    /**
     * @inheritDoc
     */
    public function isNotInteger(): bool
    {
        return !$this->isInteger();
    }

    /**
     * @inheritDoc
     */
    public function isFloat(): bool
    {
        return is_float($this->getValue());
    }

    /**
     * @inheritDoc
     */
    public function isNotFloat(): bool
    {
        return !$this->isFloat();
    }

    /**
     * @inheritDoc
     */
    public function isEven(): bool
    {
        return $this->isInteger() && $this->getValue() % 2 === 0;
    }

    /**
     * @inheritDoc
     */
    public function isNotEven(): bool
    {
        return !$this->isEven();
    }

    /**
     * @inheritDoc
     */
    public function isOdd(): bool
    {
        return $this->isInteger() && $this->getValue() % 2 !== 0;
    }

    /**
     * @inheritDoc
     */
    public function isNotOdd(): bool
    {
        return !$this->isOdd();
    }

    /**
     * @inheritDoc
     */
    public function isInfinite(): bool
    {
        return $this->getNumericalValue()->isInfinite();
    }

    /**
     * @inheritDoc
     */
    public function isNotInfinite(): bool
    {
        return !$this->isInfinite();
    }

    /**
     * @inheritDoc
     */
    public function isFinite(): bool
    {
        return $this->isNotInfinite();
    }

    /**
     * @inheritDoc
     */
    public function isNotFinite(): bool
    {
        return !$this->isFinite();
    }

    /**
     * @inheritDoc
     */
    public function round(int $precision = 0, int $mode = PHP_ROUND_HALF_UP): static
    {
        $this->getNumericalValue()->round($precision, $mode);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function ceil(int $precision = 0): static
    {
        $this->getNumericalValue()->ceil($precision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function floor(int $precision = 0): static
    {
        $this->getNumericalValue()->floor($precision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function negate(): static
    {
        return $this->multiply(-1);
    }

    /**
     * @inheritDoc
     */
    public function abs(): static
    {
        if ($this->isNotNegative()) {
            return $this;
        }

        return $this->negate();
    }

    /**
     * @inheritDoc
     */
    public function hasSameValueAs(NumericalComparableProperty|int|float $property): bool
    {
        return $this->getValue() === ($property instanceof NumericalComparableProperty ?
            $property->getValue() :
            $property
        );
    }

    /**
     * @inheritDoc
     */
    public function hasNotSameValueAs(NumericalComparableProperty|int|float $property): bool
    {
        return !$this->hasSameValueAs($property);
    }

    /**
     * @inheritDoc
     */
    public function is(ComparableProperty|int|float $property, bool $strict = false): bool
    {
        return $strict === false ?
            $this->hasSameValueAs(
                $property instanceof ComparableProperty ?
                    $property->convertToUnit($this->getUnit()) :
                    $property
            ) :
            $this->hasSameValueAs($property) &&
            (!$property instanceof ComparableProperty || $this->getUnit()->is($property->getUnit()));
    }

    /**
     * @inheritDoc
     */
    public function isNot(ComparableProperty|int|float $property, bool $strict = false): bool
    {
        return !$this->is($property, $strict);
    }

    /**
     * @inheritDoc
     */
    abstract public function getValue(): int|float;

    /**
     * @inheritDoc
     */
    abstract public function getUnit(): Unit;

    /**
     * @inheritDoc
     */
    abstract public function convertToUnit(Unit $unit): NumericalProperty;
}
