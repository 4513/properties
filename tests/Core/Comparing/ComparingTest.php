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
class ComparingTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::isLessThan
     * @covers ::isNotGreaterThanOrEqualTo
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $first
     * @param \MiBo\Properties\NumericalProperty $second
     *
     * @return void
     *
     * @dataProvider comparingIsSmallerThanProvider
     */
    public function testIsSmallerThan(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        $this->assertSame($expectedResult, $first->isLessThan($second));
        $this->assertSame($expectedResult, $first->isNotGreaterThanOrEqualTo($second));
    }

    /**
     * @small
     *
     * @covers ::isNotLessThan
     * @covers ::isGreaterThanOrEqualTo
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $first
     * @param \MiBo\Properties\NumericalProperty $second
     *
     * @return void
     *
     * @dataProvider comparingIsSmallerThanProvider
     */
    public function testIsNotSmallerThan(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        $this->assertSame(!$expectedResult, $first->isNotLessThan($second));
        $this->assertSame(!$expectedResult, $first->isGreaterThanOrEqualTo($second));
    }

    /**
     * @small
     *
     * @covers ::isGreaterThan
     * @covers ::isNotLessThanOrEqualTo
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $first
     * @param \MiBo\Properties\NumericalProperty $second
     *
     * @return void
     *
     * @dataProvider comparingIsBiggerThanProvider
     */
    public function testIsBiggerThan(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        $this->assertSame($expectedResult, $first->isGreaterThan($second));
        $this->assertSame($expectedResult, $first->isNotLessThanOrEqualTo($second));
    }

    /**
     * @small
     *
     * @covers ::isNotGreaterThan
     * @covers ::isLessThanOrEqualTo
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $first
     * @param \MiBo\Properties\NumericalProperty $second
     *
     * @return void
     *
     * @dataProvider comparingIsBiggerThanProvider
     */
    public function testIsNotBiggerThan(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        $this->assertSame(!$expectedResult, $first->isNotGreaterThan($second));
        $this->assertSame(!$expectedResult, $first->isLessThanOrEqualTo($second));
    }

    /**
     * @small
     *
     * @covers ::isEqualTo
     * @covers ::isNotEqualTo
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $first
     * @param \MiBo\Properties\NumericalProperty $second
     *
     * @return void
     *
     * @dataProvider sameValuesProvider
     */
    public function testEquivalence(
        bool $expectedResult,
        NumericalProperty $first,
        NumericalProperty $second
    ): void
    {
        $this->assertSame($expectedResult, $first->isEqualTo($second));
        $this->assertSame(!$expectedResult, $first->isNotEqualTo($second));
    }

    /**
     * @small
     *
     * @covers ::isBetween
     * @covers ::isNotBetween
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $firstLim
     * @param \MiBo\Properties\NumericalProperty $checkedValue
     * @param \MiBo\Properties\NumericalProperty $secondLim
     *
     * @return void
     *
     * @dataProvider betweenProvider
     */
    public function testBetween(
        bool $expectedResult,
        NumericalProperty $firstLim,
        NumericalProperty $checkedValue,
        NumericalProperty $secondLim
    ): void
    {
        $this->assertSame($expectedResult, $checkedValue->isBetween($firstLim, $secondLim));
        $this->assertSame(!$expectedResult, $checkedValue->isNotBetween($firstLim, $secondLim));
    }

    /**
     * @small
     *
     * @covers ::isBetweenOrEqualTo
     * @covers ::isNotBetweenOrEqualTo
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $firstLim
     * @param \MiBo\Properties\NumericalProperty $checkedValue
     * @param \MiBo\Properties\NumericalProperty $secondLim
     *
     * @return void
     *
     * @dataProvider betweenOrEqualProvider
     */
    public function testBetweenOrEqual(
        bool $expectedResult,
        NumericalProperty $firstLim,
        NumericalProperty $checkedValue,
        NumericalProperty $secondLim
    ): void
    {
        $this->assertSame($expectedResult, $checkedValue->isBetweenOrEqualTo($firstLim, $secondLim));
        $this->assertSame(!$expectedResult, $checkedValue->isNotBetweenOrEqualTo($firstLim, $secondLim));
    }

    /**
     * @small
     *
     * @covers ::isPositive
     * @covers ::isNotPositive
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     *
     * @return void
     *
     * @dataProvider positiveValuesProvider
     */
    public function testPositives(bool $expectedResult, NumericalProperty $property): void
    {
        $this->assertSame($expectedResult, $property->isPositive());
        $this->assertSame(!$expectedResult, $property->isNotPositive());
        $this->assertSame($expectedResult, $property->isNotNegative() && !$property->isZero());
    }

    /**
     * @small
     *
     * @covers ::isNegative
     * @covers ::isNotNegative
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     *
     * @return void
     *
     * @dataProvider negativeValuesProvider
     */
    public function testNegatives(bool $expectedResult, NumericalProperty $property): void
    {
        $this->assertSame($expectedResult, $property->isNegative());
        $this->assertSame(!$expectedResult, $property->isNotNegative());
        $this->assertSame($expectedResult, $property->isNotPositive() && !$property->isZero());
    }

    /**
     * @small
     *
     * @covers ::isZero
     * @covers ::isNotZero
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     *
     * @return void
     *
     * @dataProvider zeroValuesProvider
     */
    public function testZeros(bool $expectedResult, NumericalProperty $property): void
    {
        $this->assertSame($expectedResult, $property->isZero());
        $this->assertSame(!$expectedResult, $property->isNotZero());
        $this->assertSame($expectedResult, $property->isNotPositive() && $property->isNotNegative());
    }

    /**
     * @small
     *
     * @covers ::isInteger
     * @covers ::isNotInteger
     * @covers ::isFloat
     * @covers ::isNotFloat
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     *
     * @return void
     *
     * @dataProvider typesProvider
     */
    public function testTypes(bool $expectedResult, NumericalProperty $property): void
    {
        $this->assertSame($expectedResult, $property->isInteger());
        $this->assertSame($expectedResult, $property->isNotFloat());
        $this->assertSame(!$expectedResult, $property->isNotInteger());
        $this->assertSame(!$expectedResult, $property->isFloat());
    }

    /**
     * @small
     *
     * @covers ::isEven
     * @covers ::isNotEven
     * @covers ::isOdd
     * @covers ::isNotOdd
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     *
     * @return void
     *
     * @dataProvider evenNumbersProvider
     */
    public function testEvenOrOdd(bool $expectedResult, NumericalProperty $property): void
    {
        $this->assertSame($expectedResult, $property->isEven());
        $this->assertSame(!$expectedResult, $property->isOdd());
        $this->assertSame($expectedResult, $property->isNotOdd());
        $this->assertSame(!$expectedResult, $property->isNotEven());
    }

    /**
     * @small
     *
     * @covers ::isEven
     * @covers ::isNotEven
     * @covers ::isOdd
     * @covers ::isNotOdd
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     *
     * @return void
     *
     * @dataProvider evenOrOddOnDecimalsProvider
     */
    public function testDecimalsEventOrOdd(bool $expectedResult, NumericalProperty $property): void
    {
        if ($expectedResult === true) {
            $this->assertTrue($property->isEven() || $property->isOdd());
            $this->assertFalse($property->isNotEven() && $property->isNotOdd());

            return;
        }

        $this->assertFalse($property->isEven());
        $this->assertFalse($property->isOdd());
    }

    /**
     * @small
     *
     * @covers ::isInfinity
     * @covers ::isNotInfinity
     * @covers ::isFinite
     * @covers ::isNotFinite
     *
     * @param bool $expectedResult
     * @param \Closure(): \MiBo\Properties\NumericalProperty $property
     *
     * @return void
     *
     * @dataProvider infiniteNumbersProvider
     */
    public function testInfinity(bool $expectedResult, Closure $property): void
    {
        $property = $property();

        $this->assertSame($expectedResult, $property->isInfinite());
        $this->assertSame($expectedResult, $property->isNotFinite());
        $this->assertSame(!$expectedResult, $property->isFinite());
        $this->assertSame(!$expectedResult, $property->isNotInfinite());
    }

    /**
     * @small
     *
     * @covers ::isPositive
     * @covers ::isNegative
     * @covers ::negate
     * @covers ::abs
     *
     * @param bool $isPositive
     * @param array<\MiBo\Properties\NumericalProperty> $properties
     *
     * @return void
     *
     * @dataProvider servePositiveValues
     */
    public function testAbsoluteAndNegations(
        bool $isPositive,
        array $properties
    ): void
    {
        foreach ($properties as $property) {
            $this->assertSame($isPositive, $property->isPositive());

            $clone = clone $property;

            if ($isPositive) {
                $this->assertTrue($property->isEqualTo($clone->abs()));
            }

            $this->assertTrue($property->negate()->negate()->isEqualTo($clone));
            $property->abs();
            $this->assertTrue($property->isPositive());
            $property->negate();
            $this->assertTrue($property->isNegative());
            $property->negate();
            $this->assertTrue($property->isPositive());
        }
    }

    /**
     * @small
     *
     * @covers ::hasSameValueAs
     * @covers ::hasNotSameValueAs
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     * @param \MiBo\Properties\NumericalProperty $otherProperty
     *
     * @return void
     *
     * @dataProvider serveSameValue
     */
    public function testSameValue(
        bool $expectedResult,
        NumericalProperty $property,
        NumericalProperty $otherProperty
    ): void
    {
        $this->assertSame($expectedResult, $property->hasSameValueAs($otherProperty));
        $this->assertSame(!$expectedResult, $property->hasNotSameValueAs($otherProperty));
    }

    /**
     * @small
     *
     * @covers ::is
     * @covers ::isNot
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     * @param \MiBo\Properties\NumericalProperty $otherProperty
     *
     * @return void
     *
     * @dataProvider checkIsProvider
     */
    public function testSameValueWithConversion(
        bool $expectedResult,
        NumericalProperty $property,
        NumericalProperty $otherProperty
    ): void
    {
        $this->assertSame($expectedResult, $property->is($otherProperty));
        $this->assertSame(!$expectedResult, $property->isNot($otherProperty));
    }

    /**
     * @small
     *
     * @covers ::is
     * @covers ::isNot
     *
     * @param bool $expectedResult
     * @param \MiBo\Properties\NumericalProperty $property
     * @param \MiBo\Properties\NumericalProperty $otherProperty
     *
     * @return void
     *
     * @dataProvider checkIsStrictProvider
     */
    public function testSameValueWithConversionStrict(
        bool $expectedResult,
        NumericalProperty $property,
        NumericalProperty $otherProperty
    ): void
    {
        $this->assertSame($expectedResult, $property->is($otherProperty, true));
        $this->assertSame(!$expectedResult, $property->isNot($otherProperty, true));
    }

    /**
     * @small
     *
     * @covers ::round
     *
     * @param int<1, 4> $mode
     * @param int $precision
     * @param array<\MiBo\Properties\NumericalProperty[]> $values
     *
     * @return void
     *
     * @dataProvider toRoundProvider
     */
    public function testRounding(int $mode, int $precision, array $values): void
    {
        foreach ($values as $properties) {
            $this->assertTrue(
                $properties[0]->round($precision, $mode)->isEqualTo($properties[1])
            );
        }
    }

    /**
     * @small
     *
     * @covers ::floor
     *
     * @param int $precision
     * @param array $values
     *
     * @return void
     *
     * @dataProvider toFloorProvider
     */
    public function testFlooring(int $precision, array $values): void
    {
        foreach ($values as $properties) {
            $this->assertTrue(
                $properties[0]->floor($precision)->isEqualTo($properties[1])
            );
        }
    }

    /**
     * @small
     *
     * @covers ::ceil
     *
     * @param int $precision
     * @param array $values
     *
     * @return void
     *
     * @dataProvider toCeilProvider
     */
    public function testCeiling(int $precision, array $values): void
    {
        foreach ($values as $properties) {
            $this->assertTrue(
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
