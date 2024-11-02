<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\V2\Properties;

use MiBo\Properties\Length;
use MiBo\Properties\Property;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class AddLengthTest
 *
 * @package MiBo\Properties\Tests\V2\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Property::class)]
#[Small]
final class AddLengthTest extends TestCase
{
    #[DataProvider('getData')]
    public function testAddToValues(
        float|int $expected,
        float|int $first,
        float|int $second
    ): void
    {
        $value1 = new Length($first, Meter::get());
        $value2 = new Length($second, Meter::get());

        $value1->add($value2);

        self::assertEquals($expected, $value1->getValue());
    }

    #[DataProvider('getData')]
    public function testAddNumberToCopiedValue(
        float|int $expected,
        float|int $first,
        float|int $second
    ): void
    {
        $value1 = new Length($first, Meter::get());
        $value2 = new Length($second, Meter::get());
        $value3 = clone $value1;

        $value3->add($value2);

        self::assertEquals($expected, $value3->getValue());

        if (round($first, 100) === 0.0 || round($second, 100) === 0.0) {
            return;
        }

        self::assertNotEquals($value1->getValue(), $value3->getValue());
    }

    #[DataProvider('getData')]
    public function testThatOnceAddedIntoAnotherEquationOldResultIsNotChanged(
        float|int $expected,
        float|int $first,
        float|int $second
    ): void
    {
        $value1 = new Length($first, Meter::get());
        $value2 = new Length($second, Meter::get());

        $value3 = clone $value1;

        $value3->add($value2);

        $value2->add($value1);

        self::assertEquals($expected, $value3->getValue());

        $value4 = clone $value3;

        self::assertEquals($expected, $value4->getValue());
    }

    #[DataProvider('getData')]
    public function testThatCloningDoesNotMatter(
        float|int $expected,
        float|int $first,
        float|int $second
    ): void
    {
        $value1 = new Length($first, Meter::get());
        $value2 = new Length($second, Meter::get());

        $value1 = clone $value1;
        $value2 = clone $value2;

        self::assertEquals($expected, $value1->add($value2)->getValue());
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
                1,
                1,
                0,
            ],
            [
                10,
                100,
                -90,
            ],
        ];
    }
}
