<?php

declare(strict_types = 1);

namespace MiBo\Properties;

use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Traits\InternationSystemProperty;

/**
 * Class Length
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Length extends NumericalProperty
{
    use InternationSystemProperty;

    /**
     * @param float|int $value
     * @param \MiBo\Properties\Contracts\NumericalUnit $unit
     */
    public function __construct(float|int $value, Unit $unit)
    {
        parent::__construct($value, $unit);
    }

    /**
     * @inheritDoc
     */
    public static function getDefaultISUnit(): string
    {
        return "Meter";
    }

    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\Length::class;
    }
}
