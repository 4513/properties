<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ValueDivideTest
 *
 * @package MiBo\Properties\Tests\Base
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
class ValueDivideTest extends TestCase
{
    public function testSimpleInt(): void
    {
        $list = [
            0  => [0, 1],
            10 => [100, 10],
            3  => [27, 9],
            -9 => [-81, 9],
        ];

        foreach ($list as $expected => $values) {
            $value = new Value($values[0]);
            $value->divide($values[1]);

            self::assertIsInt($value->getValue());
            self::assertSame($expected, $value->getValue());
        }
    }

    public function testSimpleIntWithExp(): void
    {
        /** @var array<array{expected: int, start: array{0: int, 1: int}, add: array{0: int, 1: int}}> $list */
        $list = [
            [
                "expected" => 1,
                "start"    => [0, 10],
                "add"      => [1, 1],
            ],
            [
                "expected" => 0,
                "start"    => [0, 0],
                "add"      => [1, 1],
            ],
            [
                "expected" => 0,
                "start"    => [0, 0],
                "add"      => [0, 10],
            ],
            [
                "expected" => -9,
                "start"    => [-2, 90],
                "add"      => [-1, -1],
            ],
            [
                "expected" => 1,
                "start"    => [0, 10],
                "add"      => [1, 1],
            ],
            [
                "expected" => 5,
                "start"    => [-1, -25],
                "add"      => [-1, -5],
            ],
        ];

        foreach ($list as $data) {
            $value = new Value($data["start"][1], $data["start"][0]);
            $value->divide($data["add"][1], $data["add"][0]);

            self::assertSame($data["expected"], $value->getValue());

            is_int($data["expected"]) ?
                self::assertIsInt($value->getValue()) :
                self::assertIsFloat($value->getValue());
        }
    }

    public function testSimpleFloat(): void
    {
        /** @var array<array{expected: int, start: array{0: int, 1: int}, add: array{0: int, 1: int}}> $list */
        $list = [
            [
                "expected" => 10.0,
                "start"    => [0, 10.0],
                "add"      => [1, 0.1],
            ],
            [
                "expected" => 0.1,
                "start"    => [0, 1],
                "add"      => [1, 1.0],
            ],
            [
                "expected" => 10,
                "start"    => [0, 10.0],
                "add"      => [0, 1.0],
            ],
            [
                "expected" => 10.0,
                "start"    => [1, 0.09],
                "add"      => [-1, 0.9],
            ],
        ];

        foreach ($list as $data) {
            $value = new Value($data["start"][1], $data["start"][0]);
            $value->divide($data["add"][1], $data["add"][0]);

            self::assertSame($data["expected"], $value->getValue());

            is_int($data["expected"]) ?
                self::assertIsInt($value->getValue()) :
                self::assertIsFloat($value->getValue());
        }
    }

    public function testDivideSelf(): void
    {
        /** @var array<array{expected: int, start: array{0: int, 1: int}, add: array{0: int, 1: int}}> $list */
        $list = [
            [
                "expected" => 1,
                "start"    => [0, 10],
                "add"      => [1, 1],
            ],
            [
                "expected" => 0.1,
                "start"    => [0, 1],
                "add"      => [1, 1],
            ],
            [
                "expected" => -1,
                "start"    => [2, 10],
                "add"      => [3, -1],
            ],
            [
                "expected" => 9,
                "start"    => [-2, 90],
                "add"      => [-1, 1],
            ],
            [
                "expected" => 1,
                "start"    => [0, 1],
                "add"      => [1, 0.1],
            ],
            [
                "expected" => 9,
                "start"    => [-1, 90],
                "add"      => [0, 1],
            ],
        ];

        foreach ($list as $data) {
            $value1 = new Value($data["start"][1], $data["start"][0]);
            $value2 = new Value($data["add"][1], $data["add"][0]);

            $value1->divide($value2);
            $value1->getValue();

            self::assertSame($data["expected"], $value1->getValue());

            is_int($data["expected"]) ?
                self::assertIsInt($value1->getValue()) :
                self::assertIsFloat($value1->getValue());
        }
    }

    public function testTenDivide(): void
    {
        $value = new Value(10);
        $value->divide(1, 1);
        self::assertSame(1, $value->getValue());

        $value = new Value(100);
        $value->divide(1, 2);
        self::assertSame(1, $value->getValue());

        $value = new Value(100);
        $value->divide(10, 1);
        self::assertSame(1, $value->getValue());

        $value = new Value(100);
        $value->divide(100);
        self::assertSame(1, $value->getValue());

        $value = new Value(100);
        self::assertSame(100, (new Value(1, 2))->getValue());
        $value->divide(new Value(100, 0));
        self::assertSame(1, $value->getValue());

        $value = new Value(100);
        $value->divide(new Value(10, 1));
        self::assertSame(1, $value->getValue());

        $value = new Value(100);
        $value->divide(new Value(1, 2));
        self::assertSame(1, $value->getValue());
    }
}
