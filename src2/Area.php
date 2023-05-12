<?php

declare(strict_types = 1);

namespace MiBo\Properties;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class Area
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Area extends NumericalProperty
{
    use InternationSystemProperty {
        getClassToCreate as contractGetClassToCreate;
    }

    /**
     * @param float|int $value
     * @param \MiBo\Properties\Contracts\Unit $unit
     * @phpstan-assert \MiBo\Properties\Units\Length\Meter $unit
     */
    public function __construct(float|int $value, Unit $unit)
    {
        parent::__construct($value, $unit);
    }

    public static function getDefaultISUnit(): string
    {
        return "Meter";
    }

    protected static function getClassToCreate(string $prefix): string
    {
        return self::contractGetClassToCreate("Square" . $prefix);
    }

    public static function getQuantityClassName(): string
    {
        return Quantities\Area::class;
    }
}
