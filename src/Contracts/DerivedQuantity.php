<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Interface DerivedQuantity
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface DerivedQuantity extends Quantity
{
    /**
     * @return string[]
     */
    public static function getEquations(): array;
}
