<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\V2\Value;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class AddOnceTest
 *
 * @package MiBo\Properties\Tests\V2\Value
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
final class AddOnceTest extends TestCase
{
    #[DataProvider('getData')]
    public function testAddToValues(
        float|int $expected,
        float|int $first,
        float|int $second,
        int $firstExp = 0,
        int $secondExp = 0
    ): void
    {
        $value1 = new Value($first, $firstExp);

        $value2 = new Value($second, $secondExp);

        $value1->add($value2);

        self::assertEquals($expected, $value1->getValue());
    }

    #[DataProvider('getData')]
    public function testAddNumberToValue(
        float|int $expected,
        float|int $first,
        float|int $second,
        int $firstExp = 0,
        int $secondExp = 0
    ): void
    {
        $value1 = new Value($first, $firstExp);

        $value1->add($second * 10**$secondExp);

        self::assertEquals($expected, $value1->getValue());
    }

    #[DataProvider('getData')]
    public function testAddNumberToCopiedValue(
        float|int $expected,
        float|int $first,
        float|int $second,
        int $firstExp = 0,
        int $secondExp = 0
    ): void
    {
        $value1 = new Value($first, $firstExp);
        $value2 = new Value($second, $secondExp);

        $value3 = clone $value1;

        $value3->add($value2);

        self::assertEquals($expected, $value3->getValue());

        if (round($first, 100) === 0.0 || round($second, 100) === 0.0) {
            return;
        }

        self::assertNotEquals($value1->getValue(), $value3->getValue());
    }

    public static function getData(): array
    {
        return [
            [
                2,
                1,
                1,
            ],
            [
                9999,
                9900,
                99,
            ],
            [
                99,
                0,
                99,
            ],
            [
                -100,
                200,
                -300,
            ],
            [
                0,
                99,
                -99,
            ],
            [
                0,
                -99,
                99,
            ],
            [
                10,
                1,
                0,
                1,
            ],
            [
                10,
                10,
                -9,
                1,
                1,
            ],
        ];
    }
}
