<?php

declare(strict_types = 1);

namespace MiBo\Properties\Contracts;

/**
 * Interface NumericalUnit
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface NumericalUnit extends Unit
{
    public function getMultiplier(): int|float;
}
