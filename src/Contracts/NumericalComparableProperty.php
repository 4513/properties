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
    /**
     * Checks that the value is less than a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is less than the given value, `false` otherwise.
     */
    public function isLessThan(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is not less than a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is not less than the given value, `false` otherwise.
     */
    public function isNotLessThan(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is less than or equal to a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is less than or equal to the given value, `false` otherwise.
     */
    public function isLessThanOrEqualTo(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is not less than or equal to a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is not less than or equal to the given value, `false` otherwise.
     */
    public function isNotLessThanOrEqualTo(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is greater than a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is greater than the given value, `false` otherwise.
     */
    public function isGreaterThan(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is not greater than a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is not greater than the given value, `false` otherwise.
     */
    public function isNotGreaterThan(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is greater than or equal to a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is greater than or equal to the given value, `false` otherwise.
     */
    public function isGreaterThanOrEqualTo(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is not greater than or equal to a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is not greater than or equal to the given value, `false` otherwise.
     */
    public function isNotGreaterThanOrEqualTo(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is equal to a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is equal to the given value, `false` otherwise.
     */
    public function isEqualTo(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is not equal to a given value.
     *
     * *If the provided property does not have the same unit, it will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare with.
     *
     * @return bool `true` if the value is not equal to the given value, `false` otherwise.
     */
    public function isNotEqualTo(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is between two given values.
     *
     * *If the provided properties do not have the same unit, they will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $first First value.
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $second Second value.
     *
     * @return bool `true` if the value is between the given values, `false` otherwise.
     */
    public function isBetween(
        NumericalComparableProperty|int|float $first,
        NumericalComparableProperty|int|float $second
    ): bool;

    /**
     * Checks that the value is not between two given values.
     *
     * *If the provided properties do not have the same unit, they will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $first First value.
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $second Second value.
     *
     * @return bool `true` if the value is not between the given values, `false` otherwise.
     */
    public function isNotBetween(
        NumericalComparableProperty|int|float $first,
        NumericalComparableProperty|int|float $second
    ): bool;

    /**
     * Checks that the value is between or equal to two given values.
     *
     * *If the provided properties do not have the same unit, they will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $first First value.
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $second Second value.
     *
     * @return bool `true` if the value is between or equal to the given values, `false` otherwise.
     */
    public function isBetweenOrEqualTo(
        NumericalComparableProperty|int|float $first,
        NumericalComparableProperty|int|float $second
    ): bool;

    /**
     * Checks that the value is not between or equal to two given values.
     *
     * *If the provided properties do not have the same unit, they will be converted.*
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $first First value.
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $second Second value.
     *
     * @return bool `true` if the value is not between or equal to the given values, `false` otherwise.
     */
    public function isNotBetweenOrEqualTo(
        NumericalComparableProperty|int|float $first,
        NumericalComparableProperty|int|float $second
    ): bool;

    /**
     * Checks that the value is positive (greater than zero).
     *
     * @return bool `true` if the value is positive, `false` otherwise.
     */
    public function isPositive(): bool;

    /**
     * Checks that the value is not positive (less than or equal to zero).
     *
     * @return bool `true` if the value is not positive, `false` otherwise.
     */
    public function isNotPositive(): bool;

    /**
     * Checks that the value is negative (less than zero).
     *
     * @return bool `true` if the value is negative, `false` otherwise.
     */
    public function isNegative(): bool;

    /**
     * Checks that the value is not negative (greater than or equal to zero).
     *
     * @return bool `true` if the value is not negative, `false` otherwise.
     */
    public function isNotNegative(): bool;

    /**
     * Checks that the value is zero.
     *
     * @return bool `true` if the value is zero, `false` otherwise.
     */
    public function isZero(): bool;

    /**
     * Checks that the value is not zero.
     *
     * @return bool `true` if the value is not zero, `false` otherwise.
     */
    public function isNotZero(): bool;

    /**
     * Checks that the value is an integer (no decimals).
     *
     * @return bool `true` if the value is an integer, `false` otherwise.
     */
    public function isInteger(): bool;

    /**
     * Checks that the value is not an integer (has decimals).
     *
     * @return bool `true` if the value is not an integer, `false` otherwise.
     */
    public function isNotInteger(): bool;

    /**
     * Checks that the value is a float (has decimals).
     *
     * @return bool `true` if the value is a float, `false` otherwise.
     */
    public function isFloat(): bool;

    /**
     * Checks that the value is not a float (no decimals).
     *
     * @return bool `true` if the value is not a float, `false` otherwise.
     */
    public function isNotFloat(): bool;

    /**
     * Checks that the value is even.
     *
     * @return bool `true` if the value is even, `false` otherwise.
     */
    public function isEven(): bool;

    /**
     * Checks that the value is not even.
     *
     * @return bool `true` if the value is not even, `false` otherwise.
     */
    public function isNotEven(): bool;

    /**
     * Checks that the value is odd.
     *
     * @return bool `true` if the value is odd, `false` otherwise.
     */
    public function isOdd(): bool;

    /**
     * Checks that the value is not odd.
     *
     * @return bool `true` if the value is not odd, `false` otherwise.
     */
    public function isNotOdd(): bool;

    /**
     * Checks that the value is infinite.
     *
     * @return bool `true` if the value is infinite, `false` otherwise.
     */
    public function isInfinite(): bool;

    /**
     * Checks that the value is not infinite.
     *
     * @return bool `true` if the value is not infinite, `false` otherwise.
     */
    public function isNotInfinite(): bool;

    /**
     * Checks that the value is finite.
     *
     * @return bool `true` if the value is finite, `false` otherwise.
     */
    public function isFinite(): bool;

    /**
     * Checks that the value is not finite.
     *
     * @return bool `true` if the value is not finite, `false` otherwise.
     */
    public function isNotFinite(): bool;

    /**
     * Rounds the value.
     *
     * This method behaves like the php 'round()' function.
     *
     * @param int $precision The optional number of decimal digits to round to. Defaults to 0. If negative, it will
     *     round to a multiple of 10.
     * @param int<1, 4> $mode One of PHP_ROUND_HALF_UP, PHP_ROUND_HALF_DOWN, PHP_ROUND_HALF_EVEN,
     *     or PHP_ROUND_HALF_ODD.
     *
     * @return static Same instance with the rounded value.
     */
    public function round(int $precision = 0, int $mode = PHP_ROUND_HALF_UP): static;

    /**
     * Rounds the value away from zero.
     *
     * @param int $precision The optional number of decimal digits to round to. Defaults to 0. If negative, it will
     *    round to a multiple of 10.
     *
     * @return static Same instance with the rounded value.
     */
    public function ceil(int $precision = 0): static;

    /**
     * Rounds the value towards zero.
     *
     * @param int $precision The optional number of decimal digits to round to. Defaults to 0. If negative, it will
     *   round to a multiple of 10.
     *
     * @return static Same instance with the rounded value.
     */
    public function floor(int $precision = 0): static;

    /**
     * Negates the value.
     *
     * @return static Same instance with the negated value.
     */
    public function negate(): static;

    /**
     * Makes the absolute value.
     *
     * @return static Same instance with the absolute value.
     */
    public function abs(): static;

    /**
     * Checks that the value is same as the value of given property.
     *
     * **This method is used to compare two values, independent on their quantity and unit. Comparing 1
     * meter to a 1 degree of Celsius will resolve into true, as they both have the same value of '1'.**
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare to.
     *
     * @return bool `true` if the value is same as the value of given property, `false` otherwise.
     */
    public function hasSameValueAs(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is not same as the value of given property.
     *
     * **This method is used to compare two values, independent on their quantity and unit. Comparing 1
     * meter to a 1 degree of Celsius will resolve into false, as they both have the same value of '1'.**
     *
     * @param \MiBo\Properties\Contracts\NumericalComparableProperty|int|float $property The property to compare to.
     *
     * @return bool `true` if the value is not same as the value of given property, `false` otherwise.
     */
    public function hasNotSameValueAs(NumericalComparableProperty|int|float $property): bool;

    /**
     * Checks that the value is same as of the given property.
     *
     * **This method checks the value of the same unit. If the properties have different units, one of them
     * will be converted and only then the comparison is made.**
     *
     * If the strict mode is enabled, the comparison will check that both of the properties have the same
     * unit.
     *
     * @param \MiBo\Properties\Contracts\ComparableProperty|int|float $property The property to compare to.
     * @param bool $strict Strict mode that checks the unit as well. Default false.
     *
     * @return bool `true` if the value is same as of the given property, `false` otherwise.
     */
    public function is(ComparableProperty|int|float $property, bool $strict = false): bool;

    /**
     * Checks that the value is not same as of the given property.
     *
     * **This method checks the value of the same unit. If the properties have different units, one of them
     * will be converted and only then the comparison is made.**
     *
     * If the strict mode is enabled, the comparison checks that both of the properties have the same unit.
     *
     * @param \MiBo\Properties\Contracts\ComparableProperty|int|float $property The property to compare to.
     * @param bool $strict Strict mode that checks the unit as well. Default false.
     *
     * @return bool `true` if the value is not same as of the given property, `false` otherwise.
     */
    public function isNot(ComparableProperty|int|float $property, bool $strict = false): bool;
}
