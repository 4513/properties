<?php

declare(strict_types=1);

namespace MiBo\Properties\Printers;

use MiBo\Properties\Contracts\NumericalProperty;
use MiBo\Properties\Contracts\PrinterInterface;

/**
 * Class PHPMonetaryPrinter
 *
 * This printer is created to print a monetary value. The format is based on the PHP locale.
 *
 * @package MiBo\Properties\Printers
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PHPMonetaryPrinter implements PrinterInterface
{
    /**
     * @inheritDoc
     */
    public function printProperty(NumericalProperty $property): string
    {
        $locale = localeconv();
        $value  = number_format($property->getValue(), 0, $locale["mon_decimal_point"], $locale["mon_thousands_sep"]);
        $unit   = $locale["currency_symbol"];

        return $this->print($value, $unit);
    }

    /**
     * @inheritDoc
     */
    public function print(string $value, string $unit): string
    {
        $locale    = localeconv();
        $positive  = str_contains($value, $locale["negative_sign"]);
        $delimiter = $locale[$positive ? "p_sep_by_space" : "n_sep_by_space"] ? " " : "";

        return $locale[$positive ? "p_cs_precedes" : "n_cs_precedes"] ?
            $unit . $delimiter . $value :
            $value . $delimiter . $unit;
    }
}
