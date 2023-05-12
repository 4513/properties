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
 *
 * @template-extends \MiBo\Properties\Property<\MiBo\Properties\Units\Length\Meter>
 */
class Length extends NumericalProperty
{
    use InternationSystemProperty;

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

    public static function getQuantityClassName(): string
    {
        return Quantities\Length::class;
    }
}
