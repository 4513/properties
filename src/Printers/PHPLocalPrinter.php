<?php

declare(strict_types=1);

namespace MiBo\Properties\Printers;

use MiBo\Properties\Contracts\NumericalProperty;
use MiBo\Properties\Contracts\PrinterInterface;
use MiBo\Properties\Quantities\ThermodynamicTemperature;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeCelsius;

/**
 * Class PHPLocalPrinter
 *
 * This printer is created to print most of the properties. The format is based on the PHP locale.
 *
 * This printer makes a special treatment for a temperature using Celsius degree.
 *
 * @package MiBo\Properties\Printers
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PHPLocalPrinter implements PrinterInterface
{
    /**
     * @inheritDoc
     */
    public function printProperty(NumericalProperty $property): string
    {
        $locale = localeconv();
        $value  = number_format($property->getValue(), 0, $locale["decimal_point"], $locale["thousands_sep"]);
        $unit   = $property::getQuantityClassName() === ThermodynamicTemperature::class &&
            $property->getUnit()->is(DegreeCelsius::get()) ?
            $property->getUnit()->getSymbol() :
            " " . $property->getUnit()->getSymbol();

        return $this->print($value, $unit);
    }

    /**
     * @inheritDoc
     */
    public function print(string $value, string $unit): string
    {
        return $value . $unit;
    }
}
