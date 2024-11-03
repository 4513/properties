<?php

declare(strict_types=1);

namespace MiBo\Properties\Exceptions;

use LogicException;
use MiBo\Properties\Contracts\CalculationException;

/**
 * Class DivisionByZeroException
 *
 * @package MiBo\Properties\Exceptions
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class DivisionByZeroException extends LogicException implements CalculationException
{
    public static function divisionByZero(): self
    {
        return new self('Division by zero is not allowed.');
    }
}
