<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Traits\UnitHelper;
use MiBo\Properties\Units\AmountOfSubstance\NanoMole;
use MiBo\Properties\Units\Volume\CubicNanoMeter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class UnitHelperTest
 *
 * @package MiBo\Properties\Tests\Core\Units
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(UnitHelper::class)]
#[Small]
class UnitHelperTest extends TestCase
{
    public function testLoad(): void
    {
        $unit = NanoMole::get();

        self::assertInstanceOf(NanoMole::class, $unit);
    }

    public function testMultiplier(): void
    {
        $unit = NanoMole::get();

        self::assertEquals(-9, $unit->getMultiplier());
    }

    public function testName(): void
    {
        $unit     = CubicNanoMeter::get();
        $expected = "cubic nanometer";

        self::assertSame($expected, $unit->getName());
        self::assertSame($expected, $unit->toString());
        self::assertSame($expected, (string) $unit);
    }

    public function testSymbol(): void
    {
        $unit     = CubicNanoMeter::get();
        $expected = "nm³";

        self::assertSame($expected, $unit->getSymbol());
    }
}
