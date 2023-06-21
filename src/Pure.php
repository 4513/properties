<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Units\Pure\NoUnit;

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
    public function __construct(float|Value|int $value)
    {
        parent::__construct($value, NoUnit::get());
    }

    public static function getQuantityClassName(): string
    {
        return Quantities\Pure::class;
    }
}
