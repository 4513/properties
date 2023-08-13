<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Comparing;

use MiBo\Properties\Value;
use PHPUnit\Framework\TestCase;

/**
 * Class RoundingTest
 *
 * @package MiBo\Properties\Tests\Comparing
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Value
 */
class RoundingTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::round
     *
     * @param int|float $expectedResult
     * @param \MiBo\Properties\Value $valueToRound
     * @param int $precision
     * @param int $mode
     *
     * @return void
     *
     * @dataProvider roundingProvider
     */
    public function testRounding(
        int|float $expectedResult,
        Value $valueToRound,
        int $precision,
        int $mode
    ): void
    {
        $this->assertSame($expectedResult, $valueToRound->round($precision, $mode)->getValue());
    }

    /**
     * @small
     *
     * @covers ::ceil
     *
     * @param int|float $expectedResult
     * @param \MiBo\Properties\Value $valueToCeil
     * @param int $precision
     *
     * @return void
     *
     * @dataProvider ceilingProvider
     */
    public function testCeil(
        int|float $expectedResult,
        Value $valueToCeil,
        int $precision
    ): void
    {
        $this->assertSame($expectedResult, $valueToCeil->ceil($precision)->getValue());
    }

    /**
     * @small
     *
     * @covers ::floor
     *
     * @param int|float $expectedResult
     * @param \MiBo\Properties\Value $valueToFloor
     * @param int $precision
     *
     * @return void
     *
     * @dataProvider flooringProvider
     */
    public function testFloor(
        int|float $expectedResult,
        Value $valueToFloor,
        int $precision
    ): void
    {
        $this->assertSame($expectedResult, $valueToFloor->floor($precision)->getValue());
    }

    /**
     * @small
     *
     * @covers ::round
     * @covers ::ceil
     * @covers ::floor
     *
     * @return void
     */
    public function testOnInfinity(): void
    {
        $value                  = new Value(1);
        $value::$preferInfinity = true;
        $value->divide(0);

        $this->assertTrue($value->isInfinite());
        $this->assertTrue($value->round()->ceil()->floor()->isInfinite());
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        Value::$preferInfinity = false;

        parent::tearDown();
    }

    /**
     * @return array<string, array{0: int, 1: \MiBo\Properties\Value, 2: int, 3: int<1, 4>}>
     */
    public static function roundingProvider(): array
    {
        return [
            'Rounding .1 to default precision, default mode' => [
                0,
                new Value(0.1),
                0,
                PHP_ROUND_HALF_UP,
            ],
            'Rounding .1 to default precision, half down' => [
                0,
                new Value(0.1),
                0,
                PHP_ROUND_HALF_DOWN,
            ],
            'Rounding .1 to default precision, half even' => [
                0,
                new Value(0.1),
                0,
                PHP_ROUND_HALF_EVEN,
            ],
            'Rounding .1 to default precision, half odd' => [
                0,
                new Value(0.1),
                0,
                PHP_ROUND_HALF_ODD,
            ],
            'Rounding 1 to default precision, default mode' => [
                1,
                new Value(1),
                0,
                PHP_ROUND_HALF_UP,
            ],
            'Rounding 1 to default precision, half down' => [
                1,
                new Value(1),
                0,
                PHP_ROUND_HALF_DOWN,
            ],
            'Rounding 1 to default precision, half even' => [
                1,
                new Value(1),
                0,
                PHP_ROUND_HALF_EVEN,
            ],
            'Rounding 1 to default precision, half odd' => [
                1,
                new Value(1),
                0,
                PHP_ROUND_HALF_ODD,
            ],
            'Rounding 1.5 to default precision, default mode' => [
                2,
                new Value(1.5),
                0,
                PHP_ROUND_HALF_UP,
            ],
            'Rounding 1.5 to default precision, half down' => [
                1,
                new Value(1.5),
                0,
                PHP_ROUND_HALF_DOWN,
            ],
            'Rounding 1.5 to default precision, half even' => [
                2,
                new Value(1.5),
                0,
                PHP_ROUND_HALF_EVEN,
            ],
            'Rounding 1.5 to default precision, half odd' => [
                1,
                new Value(1.5),
                0,
                PHP_ROUND_HALF_ODD,
            ],
            'Rounding .6 to tens precision, default mode' => [
                0,
                new Value(0.6),
                -1,
                PHP_ROUND_HALF_UP,
            ],
            'Rounding .6 to tens precision, half down' => [
                0,
                new Value(0.6),
                -1,
                PHP_ROUND_HALF_DOWN,
            ],
            'Rounding .6 to tens precision, half even' => [
                0,
                new Value(0.6),
                -1,
                PHP_ROUND_HALF_EVEN,
            ],
            'Rounding .6 to tens precision, half odd' => [
                0,
                new Value(0.6),
                -1,
                PHP_ROUND_HALF_ODD,
            ],
            'Rounding 5 to tens precision, default mode' => [
                10,
                new Value(5),
                -1,
                PHP_ROUND_HALF_UP,
            ],
            'Rounding 5 to tens precision, half down' => [
                0,
                new Value(5),
                -1,
                PHP_ROUND_HALF_DOWN,
            ],
            'Rounding 5 to tens precision, half even' => [
                0,
                new Value(5),
                -1,
                PHP_ROUND_HALF_EVEN,
            ],
            'Rounding 5 to tens precision, half odd' => [
                10,
                new Value(5),
                -1,
                PHP_ROUND_HALF_ODD,
            ],
            'Rounding .05 to tens of unit precision, default mode' => [
                0.1,
                new Value(0.05),
                1,
                PHP_ROUND_HALF_UP,
            ],
            'Rounding .05 to tens of unit precision, half down' => [
                0,
                new Value(0.05),
                1,
                PHP_ROUND_HALF_DOWN,
            ],
            'Rounding .05 to tens of unit precision, half even' => [
                0,
                new Value(0.05),
                1,
                PHP_ROUND_HALF_EVEN,
            ],
            'Rounding .05 to tens of unit precision, half odd' => [
                0.1,
                new Value(0.05),
                1,
                PHP_ROUND_HALF_ODD,
            ],
            'Rounding 1 plus .5 to default precision, default mode' => [
                2,
                (new Value(1))->add(new Value(0.5)),
                0,
                PHP_ROUND_HALF_UP,
            ],
            'Rounding 1 plus .5 to default precision, half down' => [
                1,
                (new Value(1))->add(new Value(0.5)),
                0,
                PHP_ROUND_HALF_DOWN,
            ],
            'Rounding 1 plus .5 to default precision, half even' => [
                2,
                (new Value(1))->add(new Value(0.5)),
                0,
                PHP_ROUND_HALF_EVEN,
            ],
            'Rounding 1 plus .5 to default precision, half odd' => [
                1,
                (new Value(1))->add(new Value(0.5)),
                0,
                PHP_ROUND_HALF_ODD,
            ],
            'Rounding 1 plus .5 with exp to default precision, default mode' => [
                2,
                (new Value(1))->add(new Value(5, -1)),
                0,
                PHP_ROUND_HALF_UP,
            ],
            'Rounding 1 plus .5 with exp to default precision, half down' => [
                1,
                (new Value(1))->add(new Value(5, -1)),
                0,
                PHP_ROUND_HALF_DOWN,
            ],
            'Rounding 1 plus .5 with exp to default precision, half even' => [
                2,
                (new Value(1))->add(new Value(5, -1)),
                0,
                PHP_ROUND_HALF_EVEN,
            ],
            'Rounding 1 plus .5 with exp to default precision, half odd' => [
                1,
                (new Value(1))->add(new Value(5, -1)),
                0,
                PHP_ROUND_HALF_ODD,
            ],
        ];
    }

    /**
     * @return array<string, array{0: int, 1: \MiBo\Properties\Value, 2: int}>
     */
    public static function ceilingProvider(): array
    {
        return [
            'Ceiling .1 to default precision' => [
                1,
                new Value(0.1),
                0,
            ],
            'Ceiling 1 to default precision' => [
                1,
                new Value(1),
                0,
            ],
            'Ceiling 1.5 to default precision' => [
                2,
                new Value(1.5),
                0,
            ],
            'Ceiling .6 to tens precision' => [
                10,
                new Value(0.6),
                -1,
            ],
            'Ceiling 5 to tens precision' => [
                10,
                new Value(5),
                -1,
            ],
            'Ceiling .05 to tens of unit precision' => [
                0.1,
                new Value(0.05),
                1,
            ],
            'Ceiling 1 plus .5 to default precision' => [
                2,
                (new Value(1))->add(new Value(0.5)),
                0,
            ],
            'Ceiling 1 plus .5 with exp to default precision' => [
                2,
                (new Value(1))->add(new Value(5, -1)),
                0,
            ],
        ];
    }

    /**
     * @return array<string, array{0: int, 1: \MiBo\Properties\Value, 2: int}>
     */
    public static function flooringProvider(): array
    {
        return [
            'Flooring .1 to default precision' => [
                0,
                new Value(0.1),
                0,
            ],
            'Flooring 1 to default precision' => [
                1,
                new Value(1),
                0,
            ],
            'Flooring 1.5 to default precision' => [
                1,
                new Value(1.5),
                0,
            ],
            'Flooring .6 to tens precision' => [
                0,
                new Value(0.6),
                -1,
            ],
            'Flooring 5 to tens precision' => [
                0,
                new Value(5),
                -1,
            ],
            'Flooring .05 to tens of unit precision' => [
                0,
                new Value(0.05),
                1,
            ],
            'Flooring 1 plus .5 to default precision' => [
                1,
                (new Value(1))->add(new Value(0.5)),
                0,
            ],
            'Flooring 1 plus .5 with exp to default precision' => [
                1,
                (new Value(1))->add(new Value(5, -1)),
                0,
            ],
        ];
    }
}
