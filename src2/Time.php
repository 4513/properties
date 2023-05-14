<?php

declare(strict_types = 1);

namespace MiBo\Properties;

/**
 * Class Time
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Time extends NumericalProperty
{
    /**
     * @inheritDoc
     *
     * @return class-string<\MiBo\Properties\Quantities\Time>
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\Time::class;
    }

    public static function getDefaultISUnit(): string
    {
        return "Second";
    }
}
