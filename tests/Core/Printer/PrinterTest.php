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
use MiBo\Properties\Traits\PrinterAwareTrait;
use MiBo\Properties\Traits\PrinterTrait;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeCelsius;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
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
#[CoversClass(PrinterAwareTrait::class)]
#[CoversClass(PrinterTrait::class)]
#[CoversClass(PHPLocalPrinter::class)]
#[CoversClass(PHPMonetaryPrinter::class)]
#[CoversClass(Length::class)]
#[Small]
class PrinterTest extends TestCase
{
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

        self::assertSame("10 properties.unit.cm.symbol[10]", $value->print());
    }

    public function testTemperature(): void
    {
        $value = ThermodynamicTemperature::CENTI(25700);

        $value->setPrinter(new PHPLocalPrinter());
        self::assertSame("25700 cK", $value->print());

        $value->convertToUnit(DegreeCelsius::get());
        self::assertSame("-16°C", $value->print());
    }

    public function testMonetary(): void
    {
        $value = new Pure(100);

        setlocale(LC_MONETARY, "en_US.UTF-8");
        $value->setPrinter(new PHPMonetaryPrinter());
        self::assertSame("$100.00", $value->print());
    }

    public function testNameOfQuantity(): void
    {
        self::assertSame("length", \MiBo\Properties\Quantities\Length::getNameForTranslation());
    }
}
