<?php

declare(strict_types=1);

namespace MiBo\Properties;

/**
 * Class Pure
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Pure extends NumericalProperty
{
    public static function getQuantityClassName(): string
    {
        return Quantities\Pure::class;
    }
}
