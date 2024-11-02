<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ValueMultiplyTest
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
class ValueMultiplyTest extends TestCase
{
    public function testSimpleInt(): void
    {
        $list = [
            0 => [0, 10],
            10  => [1, 10],
            27  => [3, 9],
            -81 => [-9, 9],
        ];

        foreach ($list as $expected => $values) {
            $value = new Value($values[0]);
            $value->multiply($values[1]);

            self::assertIsInt($value->getValue());
            self::assertSame($expected, $value->getValue());

            $expected === 0 ?
                self::assertSame([], $value->getValues()) :
                self::assertSame([0 => $expected], $value->getValues());
        }
    }

    public function testSimpleIntWithExp(): void
    {
        /** @var array<array{expected: int, start: array{0: int, 1: int}, add: array{0: int, 1: int}}> $list */
        $list = [
            [
                "expected" => 0,
                "start"    => [0, 10],
                "add"      => [1, 0],
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
                "expected" => -0.09,
                "start"    => [-2, 90],
                "add"      => [-1, -1],
            ],
            [
                "expected" => 0,
                "start"    => [0, 1],
                "add"      => [1, 0],
            ],
            [
                "expected" => 9,
                "start"    => [-1, 10],
                "add"      => [0, 9],
            ],
        ];

        foreach ($list as $data) {
            $value = new Value($data["start"][1], $data["start"][0]);
            $value->multiply($data["add"][1], $data["add"][0]);

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
                "expected" => 100,
                "start"    => [0, 10.0],
                "add"      => [1, 1],
            ],
            [
                "expected" => 10,
                "start"    => [0, 1],
                "add"      => [1, 1.0],
            ],
            [
                "expected" => 10,
                "start"    => [0, 1.0],
                "add"      => [0, 10.0],
            ],
            [
                "expected" => 0.09,
                "start"    => [1, 0.09],
                "add"      => [-1, 1],
            ],
        ];

        foreach ($list as $data) {
            $value = new Value($data["start"][1], $data["start"][0]);
            $value->multiply($data["add"][1], $data["add"][0]);

            self::assertSame($data["expected"], $value->getValue());

            is_int($data["expected"]) ?
                self::assertIsInt($value->getValue()) :
                self::assertIsFloat($value->getValue());
        }
    }

    public function testMultiplySelf(): void
    {
        /** @var array<array{expected: int, start: array{0: int, 1: int}, add: array{0: int, 1: int}}> $list */
        $list = [
            [
                "expected" => 0,
                "start"    => [0, 10],
                "add"      => [1, 0],
            ],
            [
                "expected" => 10,
                "start"    => [0, 1],
                "add"      => [1, 1],
            ],
            [
                "expected" => -10,
                "start"    => [0, 1],
                "add"      => [0, -10],
            ],
            [
                "expected" => 0.09,
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

            $value1->multiply($value2);

            self::assertSame($data["expected"], $value1->getValue());

            is_int($data["expected"]) ?
                self::assertIsInt($value1->getValue()) :
                self::assertIsFloat($value1->getValue());
        }
    }
}
