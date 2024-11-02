<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Calculators;

use InvalidArgumentException;
use MiBo\Properties\Calculators\UnitConvertor;
use MiBo\Properties\Length;
use MiBo\Properties\ThermodynamicTemperature;
use MiBo\Properties\Time;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeCelsius;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeFahrenheit;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeNewton;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeRankine;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeReaumur;
use MiBo\Properties\Units\ThermodynamicTemperature\DegreeRomer;
use MiBo\Properties\Units\ThermodynamicTemperature\Kelvin;
use MiBo\Properties\Units\Time\Minute;
use MiBo\Properties\Units\Time\Second;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class UnitConvertorTest
 *
 * @package MiBo\Properties\Tests\Calculators
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(UnitConvertor::class)]
#[Small]
class UnitConvertorTest extends TestCase
{
    public function testConvertAlreadyConverted(): void
    {
        $property = new Length(1, Meter::get());

        self::assertSame($property->getValue(), UnitConvertor::convert($property, Meter::get())->getValue());
    }

    public function testConvertToForbiddenUnit(): void
    {
        $property = new Length(1, Meter::get());

        $this->expectException(InvalidArgumentException::class);

        UnitConvertor::convert($property, Kelvin::get());
    }

    public function testConvertSimple(): void
    {
        $property = new Time(60, Second::get());

        $converted = UnitConvertor::convert($property, Minute::get());

        self::assertSame(1, $converted->getValue());
    }

    public function testConvertComplex(): void
    {
        $property = new ThermodynamicTemperature(new Value(27_315, -2), Kelvin::get());

        $converted = UnitConvertor::convert($property, DegreeCelsius::get());

        self::assertSame(0, $converted->getValue());
    }
}
