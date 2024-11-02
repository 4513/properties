<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Comparing;

use Closure;
use MiBo\Properties\Area;
use MiBo\Properties\Length;
use MiBo\Properties\NumericalProperty;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Length\CentiMeter;
use MiBo\Properties\Units\Length\DeciMeter;
use MiBo\Properties\Units\Length\KiloMeter;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Length\MilliMeter;
use MiBo\Properties\Units\Volume\CubicMeter;
use MiBo\Properties\Value;
use MiBo\Properties\Volume;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ComparingTest
 *
 * @package MiBo\Properties\Tests\Comparing
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\NumericalProperty
 */
#[CoversClass(NumericalProperty::class)]
#[Small]
class ComparingTest extends TestCase
{
    #[DataProvider('comparingIsSmallerThanProvider')]
    public function testIsSmallerThan(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        self::assertSame($expectedResult, $first->isLessThan($second));
        self::assertSame($expectedResult, $first->isNotGreaterThanOrEqualTo($second));
    }

    #[DataProvider('comparingIsSmallerThanProvider')]
    public function testIsNotSmallerThan(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        self::assertSame(!$expectedResult, $first->isNotLessThan($second));
        self::assertSame(!$expectedResult, $first->isGreaterThanOrEqualTo($second));
    }

    #[DataProvider('comparingIsBiggerThanProvider')]
    public function testIsBiggerThan(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        self::assertSame($expectedResult, $first->isGreaterThan($second));
        self::assertSame($expectedResult, $first->isNotLessThanOrEqualTo($second));
    }

    #[DataProvider('comparingIsBiggerThanProvider')]
    public function testIsNotBiggerThan(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        self::assertSame(!$expectedResult, $first->isNotGreaterThan($second));
        self::assertSame(!$expectedResult, $first->isLessThanOrEqualTo($second));
    }

    #[DataProvider('sameValuesProvider')]
    public function testEquivalence(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        self::assertSame($expectedResult, $first->isEqualTo($second));
        self::assertSame(!$expectedResult, $first->isNotEqualTo($second));
    }

    #[DataProvider('betweenProvider')]
    public function testBetween(
        bool $expectedResult,
        NumericalProperty $firstLim,
        NumericalProperty $checkedValue,
        NumericalProperty $secondLim
    ): void
    {
        self::assertSame($expectedResult, $checkedValue->isBetween($firstLim, $secondLim));
        self::assertSame(!$expectedResult, $checkedValue->isNotBetween($firstLim, $secondLim));
    }

    #[DataProvider('betweenOrEqualProvider')]
    public function testBetweenOrEqual(
        bool $expectedResult,
        NumericalProperty $firstLim,
        NumericalProperty $checkedValue,
        NumericalProperty $secondLim
    ): void
    {
        self::assertSame($expectedResult, $checkedValue->isBetweenOrEqualTo($firstLim, $secondLim));
        self::assertSame(!$expectedResult, $checkedValue->isNotBetweenOrEqualTo($firstLim, $secondLim));
    }

    #[DataProvider('positiveValuesProvider')]
    public function testPositives(bool $expectedResult, NumericalProperty $property): void
    {
        self::assertSame($expectedResult, $property->isPositive());
        self::assertSame(!$expectedResult, $property->isNotPositive());
        self::assertSame($expectedResult, $property->isNotNegative() && !$property->isZero());
    }

    #[DataProvider('negativeValuesProvider')]
    public function testNegatives(bool $expectedResult, NumericalProperty $property): void
    {
        self::assertSame($expectedResult, $property->isNegative());
        self::assertSame(!$expectedResult, $property->isNotNegative());
        self::assertSame($expectedResult, $property->isNotPositive() && !$property->isZero());
    }

    #[DataProvider('zeroValuesProvider')]
    public function testZeros(bool $expectedResult, NumericalProperty $property): void
    {
        self::assertSame($expectedResult, $property->isZero());
        self::assertSame(!$expectedResult, $property->isNotZero());
        self::assertSame($expectedResult, $property->isNotPositive() && $property->isNotNegative());
    }

    #[DataProvider('typesProvider')]
    public function testTypes(bool $expectedResult, NumericalProperty $property): void
    {
        self::assertSame($expectedResult, $property->isInteger());
        self::assertSame($expectedResult, $property->isNotFloat());
        self::assertSame(!$expectedResult, $property->isNotInteger());
        self::assertSame(!$expectedResult, $property->isFloat());
    }

    #[DataProvider('evenNumbersProvider')]
    public function testEvenOrOdd(bool $expectedResult, NumericalProperty $property): void
    {
        self::assertSame($expectedResult, $property->isEven());
        self::assertSame(!$expectedResult, $property->isOdd());
        self::assertSame($expectedResult, $property->isNotOdd());
        self::assertSame(!$expectedResult, $property->isNotEven());
    }

    #[DataProvider('evenOrOddOnDecimalsProvider')]
    public function testDecimalsEventOrOdd(bool $expectedResult, NumericalProperty $property): void
    {
        if ($expectedResult === true) {
            self::assertTrue($property->isEven() || $property->isOdd());
            self::assertFalse($property->isNotEven() && $property->isNotOdd());

            return;
        }

        self::assertFalse($property->isEven());
        self::assertFalse($property->isOdd());
    }

    #[DataProvider('infiniteNumbersProvider')]
    public function testInfinity(bool $expectedResult, Closure $property): void
    {
        $property = $property();

        self::assertSame($expectedResult, $property->isInfinite());
        self::assertSame($expectedResult, $property->isNotFinite());
        self::assertSame(!$expectedResult, $property->isFinite());
        self::assertSame(!$expectedResult, $property->isNotInfinite());
    }

    #[DataProvider('servePositiveValues')]
    public function testAbsoluteAndNegations(
        bool $isPositive,
        array $properties
    ): void
    {
        foreach ($properties as $property) {
            self::assertSame($isPositive, $property->isPositive());

            $clone = clone $property;

            if ($isPositive) {
                self::assertTrue($property->isEqualTo($clone->abs()));
            }

            self::assertTrue($property->negate()->negate()->isEqualTo($clone));
            $property->abs();
            self::assertTrue($property->isPositive());
            $property->negate();
            self::assertTrue($property->isNegative());
            $property->negate();
            self::assertTrue($property->isPositive());
        }
    }

    #[DataProvider('serveSameValue')]
    public function testSameValue(
        bool $expectedResult,
        NumericalProperty $property,
        NumericalProperty $otherProperty
    ): void
    {
        self::assertSame($expectedResult, $property->hasSameValueAs($otherProperty));
        self::assertSame(!$expectedResult, $property->hasNotSameValueAs($otherProperty));
    }

    #[DataProvider('checkIsProvider')]
    public function testSameValueWithConversion(
        bool $expectedResult,
        NumericalProperty $property,
        NumericalProperty $otherProperty
    ): void
    {
        self::assertSame($expectedResult, $property->is($otherProperty));
        self::assertSame(!$expectedResult, $property->isNot($otherProperty));
    }

    #[DataProvider('checkIsStrictProvider')]
    public function testSameValueWithConversionStrict(
        bool $expectedResult,
        NumericalProperty $property,
        NumericalProperty $otherProperty
    ): void
    {
        self::assertSame($expectedResult, $property->is($otherProperty, true));
        self::assertSame(!$expectedResult, $property->isNot($otherProperty, true));
    }

    #[DataProvider('toRoundProvider')]
    public function testRounding(int $mode, int $precision, array $values): void
    {
        foreach ($values as $properties) {
            self::assertTrue(
                $properties[0]->round($precision, $mode)->isEqualTo($properties[1])
            );
        }
    }

    #[DataProvider('toFloorProvider')]
    public function testFlooring(int $precision, array $values): void
    {
        foreach ($values as $properties) {
            self::assertTrue(
                $properties[0]->floor($precision)->isEqualTo($properties[1])
            );
        }
    }

    #[DataProvider('toCeilProvider')]
    public function testCeiling(int $precision, array $values): void
    {
        foreach ($values as $properties) {
            self::assertTrue(
                $properties[0]->ceil($precision)->isEqualTo($properties[1])
            );
        }
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty, 2: \MiBo\Properties\NumericalProperty}>
     */
    public static function comparingIsSmallerThanProvider(): array
    {
        return [
            'Ascending integers' => [
                true,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
            ],
            'Descending integers' => [
                false,
                new Length(2, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Ascending floats' => [
                true,
                new Length(1.1, Meter::get()),
                new Length(2.2, Meter::get()),
            ],
            'Descending floats' => [
                false,
                new Length(2.2, Meter::get()),
                new Length(1.1, Meter::get()),
            ],
            'Ascending integers and floats' => [
                true,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
            ],
            'Descending integers and floats' => [
                false,
                new Length(2.2, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Same integers and floats' => [
                false,
                new Length(1, Meter::get()),
                new Length(1.0, Meter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty, 2: \MiBo\Properties\NumericalProperty}>
     */
    public static function comparingIsBiggerThanProvider(): array
    {
        return [
            'Ascending integers' => [
                false,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
            ],
            'Descending integers' => [
                true,
                new Length(2, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Ascending floats' => [
                false,
                new Length(1.1, Meter::get()),
                new Length(2.2, Meter::get()),
            ],
            'Descending floats' => [
                true,
                new Length(2.2, Meter::get()),
                new Length(1.1, Meter::get()),
            ],
            'Ascending integers and floats' => [
                false,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
            ],
            'Descending integers and floats' => [
                true,
                new Length(2.2, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Same integers and floats' => [
                false,
                new Length(1, Meter::get()),
                new Length(1.0, Meter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty, 2: \MiBo\Properties\NumericalProperty}>
     */
    public static function sameValuesProvider(): array
    {
        return [
            'Same integers' => [
                true,
                new Length(1, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Same floats' => [
                true,
                new Length(1.1, Meter::get()),
                new Length(1.1, Meter::get()),
            ],
            'Same integers and floats' => [
                true,
                new Length(1, Meter::get()),
                new Length(1.0, Meter::get()),
            ],
            'Same integers and floats with different units' => [
                true,
                new Length(1, Meter::get()),
                new Length(100, Centimeter::get()),
            ],
            'Different integers' => [
                false,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
            ],
            'Different floats' => [
                false,
                new Length(1.1, Meter::get()),
                new Length(2.2, Meter::get()),
            ],
            'Different integers and floats' => [
                false,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
            ],
            'Different integers and floats with different units' => [
                false,
                new Length(1, Meter::get()),
                new Length(10000, Centimeter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{
     *     0: bool,
     *     1: \MiBo\Properties\NumericalProperty,
     *     2: \MiBo\Properties\NumericalProperty,
     *     3: \MiBo\Properties\NumericalProperty
     * }>
     */
    public static function betweenProvider(): array
    {
        return [
            'Between integers' => [
                true,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
                new Length(3, Meter::get()),
            ],
            'Between floats' => [
                true,
                new Length(1.1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(3.3, Meter::get()),
            ],
            'Between integers and floats' => [
                true,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(3, Meter::get()),
            ],
            'Between integers and floats with different units' => [
                true,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(300, Centimeter::get()),
            ],
            'Same integers' => [
                false,
                new Length(1, Meter::get()),
                new Length(1, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Same floats' => [
                false,
                new Length(1.1, Meter::get()),
                new Length(1.1, Meter::get()),
                new Length(1.1, Meter::get()),
            ],
            'Same integers and floats' => [
                false,
                new Length(1, Meter::get()),
                new Length(1.0, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Float Precision but between' => [
                true,
                new Length(1.10, Meter::get()),
                new Length(1.11, Meter::get()),
                new Length(1.12, Meter::get()),
            ],
            'Reversed integers' => [
                true,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
                new Length(3, Meter::get()),
            ],
            'Reversed floats' => [
                true,
                new Length(1.1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(3.3, Meter::get()),
            ],
            'Reversed integers and floats' => [
                true,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(3, Meter::get()),
            ],
            'Not between' => [
                false,
                new Length(1.0, Meter::get()),
                new Length(1, Meter::get()),
                new Length(1.1, Meter::get()),
            ],
            'Out of range' => [
                false,
                new Length(1.0, Meter::get()),
                new Length(1000, Meter::get()),
                new Length(1.0, Centimeter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{
     *     0: bool,
     *     1: \MiBo\Properties\NumericalProperty,
     *     2: \MiBo\Properties\NumericalProperty,
     *     3: \MiBo\Properties\NumericalProperty
     * }>
     */
    public static function betweenOrEqualProvider(): array
    {
        return [
            'Between integers' => [
                true,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
                new Length(3, Meter::get()),
            ],
            'Between floats' => [
                true,
                new Length(1.1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(3.3, Meter::get()),
            ],
            'Between integers and floats' => [
                true,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(3, Meter::get()),
            ],
            'Between integers and floats with different units' => [
                true,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(300, Centimeter::get()),
            ],
            'Same integers' => [
                true,
                new Length(1, Meter::get()),
                new Length(1, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Same floats' => [
                true,
                new Length(1.1, Meter::get()),
                new Length(1.1, Meter::get()),
                new Length(1.1, Meter::get()),
            ],
            'Same integers and floats' => [
                true,
                new Length(1, Meter::get()),
                new Length(1.0, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Float Precision but between' => [
                true,
                new Length(1.10, Meter::get()),
                new Length(1.11, Meter::get()),
                new Length(1.12, Meter::get()),
            ],
            'Reversed integers' => [
                true,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
                new Length(3, Meter::get()),
            ],
            'Reversed floats' => [
                true,
                new Length(1.1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(3.3, Meter::get()),
            ],
            'Reversed integers and floats' => [
                true,
                new Length(1, Meter::get()),
                new Length(2.2, Meter::get()),
                new Length(3, Meter::get()),
            ],
            'Not between' => [
                true,
                new Length(1.0, Meter::get()),
                new Length(1, Meter::get()),
                new Length(1.1, Meter::get()),
            ],
            'Out of range' => [
                false,
                new Length(1.0, Meter::get()),
                new Length(1000, Meter::get()),
                new Length(1.0, Centimeter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty}>
     */
    public static function positiveValuesProvider(): array
    {
        return [
            'Positive integer' => [
                true,
                new Length(1, Meter::get()),
            ],
            'Positive float' => [
                true,
                new Length(1.1, Meter::get()),
            ],
            'Zero' => [
                false,
                new Length(0, Meter::get()),
            ],
            'Negative integer' => [
                false,
                new Length(-1, Meter::get()),
            ],
            'Negative float' => [
                false,
                new Length(-1.1, Meter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty}>
     */
    public static function negativeValuesProvider(): array
    {
        return [
            'Positive integer' => [
                false,
                new Length(1, Meter::get()),
            ],
            'Positive float' => [
                false,
                new Length(1.1, Meter::get()),
            ],
            'Zero' => [
                false,
                new Length(0, Meter::get()),
            ],
            'Negative integer' => [
                true,
                new Length(-1, Meter::get()),
            ],
            'Negative float' => [
                true,
                new Length(-1.1, Meter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty}>
     */
    public static function zeroValuesProvider(): array
    {
        return [
            'Positive integer' => [
                false,
                new Length(1, Meter::get()),
            ],
            'Positive float' => [
                false,
                new Length(1.1, Meter::get()),
            ],
            'Zero' => [
                true,
                new Length(0, Meter::get()),
            ],
            'Negative integer' => [
                false,
                new Length(-1, Meter::get()),
            ],
            'Negative float' => [
                false,
                new Length(-1.1, Meter::get()),
            ],
            'Floating zero' => [
                true,
                new Length(0.0, Meter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty}>
     */
    public static function typesProvider(): array
    {
        return [
            'integer' => [
                true,
                new Length(1, Meter::get()),
            ],
            'float' => [
                false,
                new Length(1.1, Meter::get()),
            ],
            'integer 2' => [
                true,
                new Length(1, Centimeter::get()),
            ],
            'float that should be int' => [
                true,
                new Length(1.0, Meter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty}>
     */
    public static function evenNumbersProvider(): array
    {
        return [
            'Even integer' => [
                true,
                new Length(2, Meter::get()),
            ],
            'Odd integer' => [
                false,
                new Length(1, Meter::get()),
            ],
            'Even float' => [
                true,
                new Length(2.0, Meter::get()),
            ],
            'Odd float' => [
                false,
                new Length(1.0, Meter::get()),
            ],
            'Zero' => [
                true,
                new Length(0, Meter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty}>
     */
    public static function evenOrOddOnDecimalsProvider(): array
    {
        return [
            'Event float' => [
                true,
                new Length(2.0, Meter::get()),
            ],
            'Odd float' => [
                true,
                new Length(1.0, Meter::get()),
            ],
            'Decimal float' => [
                false,
                new Length(1.1, Meter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty}>
     */
    public static function infiniteNumbersProvider(): array
    {
        return [
            'Positive infinite' => [
                true,
                function() {
                    Value::$preferInfinity = true;
                    return new Length(INF, Meter::get());
                },
            ],
            'Negative infinite' => [
                true,
                function() {
                    Value::$preferInfinity = true;
                    return new Length(-INF, Meter::get());
                },
            ],
            'Not infinite' => [
                false,
                function() {
                    Value::$preferInfinity = true;
                    return new Length(1.0, Meter::get());
                },
            ],
            'Not infinite 2' => [
                false,
                function() {
                    Value::$preferInfinity = true;
                    return new Length(-1.0, Meter::get());
                },
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty[]}>
     */
    public static function servePositiveValues(): array
    {
        return [
            'Positive integers' => [
                true,
                [
                    new Length(1, Meter::get()),
                    new Length(1, Meter::get()),
                    new Length(10, Meter::get()),
                    new Length(512, Meter::get()),
                    new Length(1024, Meter::get()),
                ],
            ],
            'Positive float' => [
                true,
                [
                    new Length(1.1, Meter::get()),
                    new Length(1.2, Meter::get()),
                    new Length(10.1, Meter::get()),
                    new Length(512.1, Meter::get()),
                    new Length(1024.001, Meter::get()),
                    new Length(0.000001, Meter::get()),
                ],
            ],
            'Negative integer' => [
                false,
                [
                    new Length(-1, Meter::get()),
                    new Length(-10, Meter::get()),
                    new Length(-512, Meter::get()),
                    new Length(-1024, Meter::get()),
                ],
            ],
            'Negative float' => [
                false,
                [
                    new Length(-1.1, Meter::get()),
                    new Length(-1.2, Meter::get()),
                    new Length(-10.1, Meter::get()),
                    new Length(-512.1, Meter::get()),
                    new Length(-1024.001, Meter::get()),
                ],
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty, 2: \MiBo\Properties\NumericalProperty}>
     */
    public static function serveSameValue(): array
    {
        return [
            'Same Value col1' => [
                true,
                new Length(1, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Same Value col2' => [
                true,
                new Length(1.1, Meter::get()),
                new Length(1.1, Meter::get()),
            ],
            'Same Value col3' => [
                true,
                new Length(0, Meter::get()),
                new Length(0, DeciMeter::get()),
            ],
            'Same Value col4' => [
                true,
                new Length(10, Meter::get()),
                new Length(10, CentiMeter::get()),
            ],
            'Different Value col1' => [
                false,
                new Length(1000, Meter::get()),
                new Length(1, KiloMeter::get()),
            ],
            'Different Value col2' => [
                false,
                new Length(1, Meter::get()),
                new Length(10, DeciMeter::get()),
            ],
            'Different Value col3' => [
                false,
                new Length(1, Meter::get()),
                new Length(100, CentiMeter::get()),
            ],
            'Different Value col4' => [
                false,
                new Length(1, Meter::get()),
                new Length(10, MilliMeter::get()),
            ],
            'Different Quantity col1' => [
                true,
                new Length(1, Meter::get()),
                new Area(1, SquareMeter::get()),
            ],
            'Different Quantity col2' => [
                true,
                new Length(1, Meter::get()),
                new Volume(1, CubicMeter::get()),
            ],
            'Diferent Quantity col3' => [
                false,
                new Length(1, Meter::get()),
                new Area(10, SquareMeter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty, 2: \MiBo\Properties\NumericalProperty}>
     */
    public static function checkIsProvider(): array
    {
        return [
            'Comparing Same' => [
                true,
                new Length(1, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Comparing with Conversion' => [
                true,
                new Length(1, Meter::get()),
                new Length(100, CentiMeter::get()),
            ],
            'Comparing with Conversion 2' => [
                true,
                new Length(1, Meter::get()),
                new Length(1000, MilliMeter::get()),
            ],
            'Comparing with Conversion 3' => [
                true,
                new Length(1, Meter::get()),
                new Length(0.001, KiloMeter::get()),
            ],
            'Comparing Different' => [
                false,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
            ],
            'Comparing Different 2' => [
                false,
                new Length(1, Meter::get()),
                new Length(1, CentiMeter::get()),
            ],
            'Comparing Different 3' => [
                false,
                new Length(1, Meter::get()),
                new Length(1, MilliMeter::get()),
            ],
            'Comparing Different 4' => [
                false,
                new Length(1, Meter::get()),
                new Length(2, KiloMeter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{0: bool, 1: \MiBo\Properties\NumericalProperty, 2: \MiBo\Properties\NumericalProperty}>
     */
    public static function checkIsStrictProvider(): array
    {
        return [
            'Comparing Same' => [
                true,
                new Length(1, Meter::get()),
                new Length(1, Meter::get()),
            ],
            'Comparing with Conversion' => [
                false,
                new Length(1, Meter::get()),
                new Length(100, CentiMeter::get()),
            ],
            'Comparing with Conversion 2' => [
                false,
                new Length(1, Meter::get()),
                new Length(1000, MilliMeter::get()),
            ],
            'Comparing with Conversion 3' => [
                false,
                new Length(1, Meter::get()),
                new Length(0.001, KiloMeter::get()),
            ],
            'Comparing Different' => [
                false,
                new Length(1, Meter::get()),
                new Length(2, Meter::get()),
            ],
            'Comparing Different 2' => [
                false,
                new Length(1, Meter::get()),
                new Length(1, CentiMeter::get()),
            ],
            'Comparing Different 3' => [
                false,
                new Length(1, Meter::get()),
                new Length(1, MilliMeter::get()),
            ],
            'Comparing Different 4' => [
                false,
                new Length(1, Meter::get()),
                new Length(2, KiloMeter::get()),
            ],
        ];
    }

    /**
     * @return array<string, array{
     *     0: int<1, 4>,
     *     1: int,
     *     2: array<array<\MiBo\Properties\NumericalProperty>>
     * }>
     */
    public static function toRoundProvider(): array
    {
        return [
            'Rounding default' => [
                PHP_ROUND_HALF_UP,
                0,
                [
                    [
                        new Length(1.1, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(1.5, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(1.9, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.1, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.5, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                    [
                        new Length(2.9, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                ],
            ],
            'Rounding half down' => [
                PHP_ROUND_HALF_DOWN,
                0,
                [
                    [
                        new Length(1.1, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(1.5, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(1.9, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.1, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.5, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.9, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                ],
            ],
            'Rounding half even' => [
                PHP_ROUND_HALF_EVEN,
                0,
                [
                    [
                        new Length(1.1, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(1.5, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(1.9, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.1, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.5, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.9, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                ],
            ],
            'Rounding half odd' => [
                PHP_ROUND_HALF_ODD,
                0,
                [
                    [
                        new Length(1.1, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(1.5, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(1.9, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.1, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.5, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                    [
                        new Length(2.9, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                ],
            ],
            'Rounding on tenths default' => [
                PHP_ROUND_HALF_UP,
                1,
                [
                    [
                        new Length(1.11, Meter::get()),
                        new Length(1.1, Meter::get()),
                    ],
                    [
                        new Length(1.15, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(1.19, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(1.21, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(1.25, Meter::get()),
                        new Length(1.3, Meter::get()),
                    ],
                    [
                        new Length(1.29, Meter::get()),
                        new Length(1.3, Meter::get()),
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<string, array{
     *     0: int,
     *     1: array<array<\MiBo\Properties\NumericalProperty>>
     * }>
     */
    public static function toFloorProvider(): array
    {
        return [
            'Flooring default' => [
                0,
                [
                    [
                        new Length(1.1, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(1.5, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(1.9, Meter::get()),
                        new Length(1, Meter::get()),
                    ],
                    [
                        new Length(2.1, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.5, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.9, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(-2.9, Meter::get()),
                        new Length(-3, Meter::get()),
                    ],
                    [
                        new Length(-3.1, Meter::get()),
                        new Length(-4, Meter::get()),
                    ],
                ],
            ],
            'Flooring on tenths' => [
                1,
                [
                    [
                        new Length(1.11, Meter::get()),
                        new Length(1.1, Meter::get()),
                    ],
                    [
                        new Length(1.15, Meter::get()),
                        new Length(1.1, Meter::get()),
                    ],
                    [
                        new Length(1.19, Meter::get()),
                        new Length(1.1, Meter::get()),
                    ],
                    [
                        new Length(1.21, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(1.25, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(1.29, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(-1.25, Meter::get()),
                        new Length(-1.3, Meter::get()),
                    ],
                    [
                        new Length(-1.29, Meter::get()),
                        new Length(-1.3, Meter::get()),
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array<string, array{
     *     0: int,
     *     1: array<array<\MiBo\Properties\NumericalProperty>>
     * }>
     */
    public static function toCeilProvider(): array
    {
        return [
            'Ceiling default' => [
                0,
                [
                    [
                        new Length(1.1, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(1.5, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(1.9, Meter::get()),
                        new Length(2, Meter::get()),
                    ],
                    [
                        new Length(2.1, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                    [
                        new Length(2.5, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                    [
                        new Length(2.9, Meter::get()),
                        new Length(3, Meter::get()),
                    ],
                    [
                        new Length(-2.9, Meter::get()),
                        new Length(-2, Meter::get()),
                    ],
                    [
                        new Length(-3.1, Meter::get()),
                        new Length(-3, Meter::get()),
                    ],
                ],
            ],
            'Ceiling on tenths' => [
                1,
                [
                    [
                        new Length(1.11, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(1.15, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(1.19, Meter::get()),
                        new Length(1.2, Meter::get()),
                    ],
                    [
                        new Length(1.21, Meter::get()),
                        new Length(1.3, Meter::get()),
                    ],
                    [
                        new Length(1.25, Meter::get()),
                        new Length(1.3, Meter::get()),
                    ],
                    [
                        new Length(1.29, Meter::get()),
                        new Length(1.3, Meter::get()),
                    ],
                    [
                        new Length(-1.25, Meter::get()),
                        new Length(-1.2, Meter::get()),
                    ],
                    [
                        new Length(-1.29, Meter::get()),
                        new Length(-1.2, Meter::get()),
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        Value::$preferInfinity = false;
        parent::tearDown();
    }
}
