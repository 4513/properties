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
    public function is(ComparableProperty $property, bool $strict = false): bool;

    public function isNot(ComparableProperty $property, bool $strict = false): bool;
}
