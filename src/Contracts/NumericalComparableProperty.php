<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

use const PHP_ROUND_HALF_UP;

/**
 * Interface NumericalComparableProperty
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface NumericalComparableProperty extends ComparableProperty
{
    public function isLessThan(NumericalComparableProperty|int|float $property): bool;

    public function isNotLessThan(NumericalComparableProperty|int|float $property): bool;

    public function isLessThanOrEqualTo(NumericalComparableProperty|int|float $property): bool;

    public function isNotLessThanOrEqualTo(NumericalComparableProperty|int|float $property): bool;

    public function isGreaterThan(NumericalComparableProperty|int|float $property): bool;

    public function isNotGreaterThan(NumericalComparableProperty|int|float $property): bool;

    public function isGreaterThanOrEqualTo(NumericalComparableProperty|int|float $property): bool;

    public function isNotGreaterThanOrEqualTo(NumericalComparableProperty|int|float $property): bool;

    public function isEqualTo(NumericalComparableProperty|int|float $property): bool;

    public function isNotEqualTo(NumericalComparableProperty|int|float $property): bool;

    public function isBetween(NumericalComparableProperty|int|float $min, NumericalComparableProperty|int|float $max): bool;

    public function isNotBetween(NumericalComparableProperty|int|float $min, NumericalComparableProperty|int|float $max): bool;

    public function isBetweenOrEqualTo(NumericalComparableProperty|int|float $min, NumericalComparableProperty|int|float $max): bool;

    public function isNotBetweenOrEqualTo(NumericalComparableProperty|int|float $min, NumericalComparableProperty|int|float $max): bool;

    public function isPositive(): bool;

    public function isNotPositive(): bool;

    public function isNegative(): bool;

    public function isNotNegative(): bool;

    public function isZero(): bool;

    public function isNotZero(): bool;

    public function isInteger(): bool;

    public function isNotInteger(): bool;

    public function isFloat(): bool;

    public function isNotFloat(): bool;

    public function isEven(): bool;

    public function isNotEven(): bool;

    public function isOdd(): bool;

    public function isNotOdd(): bool;

    public function isInfinite(): bool;

    public function isNotInfinite(): bool;

    public function isFinite(): bool;

    public function isNotFinite(): bool;

    public function round(int $precision = 0, int $mode = PHP_ROUND_HALF_UP): static;

    public function ceil(int $precision = 0): static;

    public function floor(int $precision = 0): static;

    public function negate(): static;

    public function abs(): static;

    public function hasSameValueAs(NumericalComparableProperty|int|float $property): bool;

    public function hasNotSameValueAs(NumericalComparableProperty|int|float $property): bool;

    public function is(ComparableProperty|int|float $property, bool $strict = false): bool;

    public function isNot(ComparableProperty|int|float $property, bool $strict = false): bool;
}
