<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Printer;

use MiBo\Properties\Contracts\NumericalProperty;
use MiBo\Properties\Contracts\PrinterInterface;
use MiBo\Properties\Length;
use MiBo\Properties\Printers\PHPLocalPrinter;
use MiBo\Properties\Printers\PHPMonetaryPrinter;
use MiBo\Properties\Pure;
use MiBo\Properties\ThermodynamicTemperature;
use MiBo\Properties\Traits\PrinterTrait;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeCelsius;
use PHPUnit\Framework\TestCase;

/**
 * Class PrinterTest
 *
 * @package MiBo\Properties\Tests\Core\Printer
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PrinterTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Traits\PrinterAwareTrait::setPrinter
     * @covers \MiBo\Properties\Traits\PrinterAwareTrait::print
     * @covers \MiBo\Properties\Traits\PrinterTrait::printProperty
     *
     * @return void
     */
    public function testAwareness(): void
    {
        $value = Length::CENTI(10);

        $value->setPrinter(new class implements PrinterInterface {
            use PrinterTrait;

            /**
             * @inheritDoc
             */
            public function print(string $value, string $unit): string
            {
                return $value . " " . $unit;
            }
        });

        $this->assertSame("10 properties.unit.cm.symbol[10]", $value->print());
    }

    /**
     * @small
     *
     * @covers \MiBo\Properties\Printers\PHPLocalPrinter::printProperty
     * @covers \MiBo\Properties\Printers\PHPLocalPrinter::print
     *
     * @return void
     */
    public function testTemperature(): void
    {
        $value = ThermodynamicTemperature::CENTI(25700);

        $value->setPrinter(new PHPLocalPrinter());
        $this->assertSame("25700 cK", $value->print());

        $value->convertToUnit(DegreeCelsius::get());
        $this->assertSame("-16°C", $value->print());
    }

    /**
     * @small
     *
     * @covers \MiBo\Properties\Printers\PHPMonetaryPrinter::printProperty
     * @covers \MiBo\Properties\Printers\PHPMonetaryPrinter::print
     *
     * @return void
     */
    public function testMonetary(): void
    {
        $value = new Pure(100);

        setlocale(LC_MONETARY, "en_US.UTF-8");
        $value->setPrinter(new PHPMonetaryPrinter());
        $this->assertSame("$100.00", $value->print());
    }

    /**
     * @small
     *
     * @covers \MiBo\Properties\Quantities\Length::getNameForTranslation
     *
     * @return void
     */
    public function testNameOfQuantity(): void
    {
        $this->assertSame("length", \MiBo\Properties\Quantities\Length::getNameForTranslation());
    }
}
