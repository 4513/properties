<?php

declare(strict_types=1);

namespace MiBo\Properties\Exceptions;

use MiBo\Properties\Contracts\PropertyException;
use UnexpectedValueException;

/**
 * Class DivisionByZeroException
 *
 * @package MiBo\Properties\Exceptions
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class DivisionByZeroException extends UnexpectedValueException implements PropertyException
{
}
