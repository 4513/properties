<?php

declare(strict_types=1);

namespace MiBo\Properties\Exceptions;

use MiBo\Properties\Contracts\InfinityException;
use UnexpectedValueException;

/**
 * Class CalculationWithInfinityException
 *
 * @package MiBo\Properties\Exceptions
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class CalculationWithInfinityException extends UnexpectedValueException implements InfinityException
{
    public static function alreadyInfinity(): self
    {
        return new self('The value is already either infinity or almost zero. Cannot calculate with it.');
    }

    public static function infinityProvided(): self
    {
        return new self('The provided value is infinity. Cannot calculate with it.');
    }
}
