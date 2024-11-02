<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\V2\Properties;

use MiBo\Properties\Length;
use MiBo\Properties\NumericalProperty;
use MiBo\Properties\Units\Length\Foot;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ConvertionTest
 *
 * @package MiBo\Properties\Tests\V2\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(NumericalProperty::class)]
#[Small]
final class ConvertionTest extends TestCase
{
    public function testThatWithNoOtherActionConvertingUnitDoesNotChangeFirstValue(): void
    {
        $value = new Length(10, Meter::get());

        // Foot results into 32.8083989501
        $valueInFoot = $value->convertToUnit(Foot::get());

        self::assertEquals(32.8083989501, $valueInFoot->getValue());

        // however, if we convert it back to Meter, the result should be still 10 as no 'save' has been made
        self::assertEquals(10, $valueInFoot->convertToUnit(Meter::get())->getValue());

        // one can see that the value is the very same object
        self::assertSame($value, $valueInFoot);
    }

    public function testThatCopyingObjectIsKindOfSavingWhichMayProduceChangeInFinalValue(): void
    {
        $value = new Length(32.80839895, Foot::get());

        $valueInMeters = $value->convertToUnit(Meter::get());
        $valueInMeters = clone $valueInMeters;
        $valueInMeters->add(10)->subtract(1);

        self::assertEquals(19.0, $valueInMeters->getValue());

        $valueInMeters->subtract(9);

        // now, the valueInFoot has no reference to the original object so the value should not be 10
        self::assertSame(32.80839895, $valueInMeters->convertToUnit(Foot::get())->getValue());

        foreach (
            [
                32.8083989500,
                32.8083989501,
                32.8083989502,
            ] as $v
        ) {
            $newValue = new Length($v, Foot::get());

            $newValueInMeter = $newValue->convertToUnit(Meter::get());

            self::assertSame(10.0, $newValueInMeter->getValue());

            $newValueInMeter = clone $newValueInMeter;

            self::assertSame($v, $newValueInMeter->convertToUnit(Foot::get())->getValue());
        }
    }

    public function testAnotherTimeBecausePreviousTestMadeMeConfused(): void
    {
        $value = new Length(new Value(32.8083989501, 0, 2), Foot::get());

        self::assertEquals(32.81, $value->getValue());

        self::assertEquals(32.81, $value->convertToUnit(Meter::get())->convertToUnit(Foot::get())->getValue());

        $valueInMeters = $value->convertToUnit(Meter::get());
        $valueInMeters = clone $valueInMeters;
        $valueInMeters->add(1)->subtract(1);

        $valueInFoot = $valueInMeters->convertToUnit(Foot::get());

        self::assertEquals(32.81, $valueInFoot->getValue());
    }
}
