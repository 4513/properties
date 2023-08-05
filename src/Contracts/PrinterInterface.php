<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Class PrinterInterface
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface PrinterInterface
{
    /**
     * Prints based on the property.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $property
     *
     * @return string
     */
    public function printProperty(NumericalProperty $property): string;

    /**
     * Prints based on the value and unit.
     *
     * @param string $value
     * @param string $unit
     *
     * @return string
     */
    public function print(string $value, string $unit): string;
}
