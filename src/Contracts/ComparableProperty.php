<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Interface ComparableProperty
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface ComparableProperty
{
    /**
     * Checks that the value is same as of the given property.
     *
     * **This method checks the value of the same unit. If the properties have different units, one of them
     * will be converted and only then the comparison is made.**
     *
     * If the strict mode is enabled, the comparison will check that both of the properties have the same
     * unit.
     *
     * @param \MiBo\Properties\Contracts\ComparableProperty $property The property to compare to.
     * @param bool $strict Strict mode that checks the unit as well. Default false.
     *
     * @return bool `true` if the value is same as of the given property, `false` otherwise.
     */
    public function is(ComparableProperty $property, bool $strict = false): bool;

    /**
     * Checks that the value is not same as of the given property.
     *
     * **This method checks the value of the same unit. If the properties have different units, one of them
     * will be converted and only then the comparison is made.**
     *
     * If the strict mode is enabled, the comparison checks that both of the properties have the same unit.
     *
     * @param \MiBo\Properties\Contracts\ComparableProperty $property The property to compare to.
     * @param bool $strict Strict mode that checks the unit as well. Default false.
     *
     * @return bool `true` if the value is not same as of the given property, `false` otherwise.
     */
    public function isNot(ComparableProperty $property, bool $strict = false): bool;
}
