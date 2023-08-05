<?php

declare(strict_types=1);

namespace MiBo\Properties\Traits;

use MiBo\Properties\Contracts\NumericalProperty;

/**
 * Trait PrinterTrait
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait PrinterTrait
{
    /**
     * @inheritDoc
     */
    abstract public function print(string $value, string $unit): string;

    /**
     * @inheritDoc
     */
    public function printProperty(NumericalProperty $property): string
    {
        $locale = localeconv();
        $value  = $property->getValue();
        $valueS = number_format($value, 0, $locale["decimal_point"], $locale["thousands_sep"]);
        $unit   = "properties.unit." . $property->getUnit()->getSymbol() . ".symbol[$value]";

        return $this->print($valueS, $unit);
    }
}
