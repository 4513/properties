<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ValueAddTest
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
class ValueAddTest extends TestCase
{
    public function testSimpleInt(): void
    {
        $list = [
            10 => [0, 10],
            11 => [1, 10],
            12 => [3, 9],
            0  => [-9, 9],
            9  => [9, 0],
        ];

        foreach ($list as $expected => $values) {
            $value = new Value($values[0]);
            $value->add($values[1]);

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
                "expected" => 10,
                "start"    => [0, 10],
                "add"      => [1, 0],
            ],
            [
                "expected" => 10,
                "start"    => [0, 0],
                "add"      => [1, 1],
            ],
            [
                "expected" => 10,
                "start"    => [0, 0],
                "add"      => [0, 10],
            ],
            [
                "expected" => 1,
                "start"    => [-2, 90],
                "add"      => [-1, 1],
            ],
            [
                "expected" => 1,
                "start"    => [0, 1],
                "add"      => [1, 0],
            ],
            [
                "expected" => 10,
                "start"    => [-1, 10],
                "add"      => [0, 9],
            ],
        ];

        foreach ($list as $data) {
            $value = new Value($data["start"][1], $data["start"][0]);
            $value->add($data["add"][1], $data["add"][0]);

            self::assertIsInt($value->getValue());
            self::assertSame($data["expected"], $value->getValue());
        }
    }

    public function testSimpleFloat(): void
    {
        /** @var array<array{expected: int, start: array{0: int, 1: int}, add: array{0: int, 1: int}}> $list */
        $list = [
            [
                "expected" => 10,
                "start"    => [0, 10.0],
                "add"      => [1, 0],
            ],
            [
                "expected" => 10,
                "start"    => [0, 0],
                "add"      => [1, 1.0],
            ],
            [
                "expected" => 10,
                "start"    => [0, 0.0],
                "add"      => [0, 10.0],
            ],
            [
                "expected" => 1,
                "start"    => [1, 0.09],
                "add"      => [-1, 1],
            ],
        ];

        foreach ($list as $data) {
            $value = new Value($data["start"][1], $data["start"][0]);
            $value->add($data["add"][1], $data["add"][0]);

            self::assertIsInt($value->getValue());
            self::assertSame($data["expected"], $value->getValue());
        }
    }

    public function testAddSelf(): void
    {
        /** @var array<array{expected: int, start: array{0: int, 1: int}, add: array{0: int, 1: int}}> $list */
        $list = [
            [
                "expected" => 10,
                "start"    => [0, 10],
                "add"      => [1, 0],
            ],
            [
                "expected" => 10,
                "start"    => [0, 0],
                "add"      => [1, 1],
            ],
            [
                "expected" => 10,
                "start"    => [0, 0],
                "add"      => [0, 10],
            ],
            [
                "expected" => 1,
                "start"    => [-2, 90],
                "add"      => [-1, 1],
            ],
            [
                "expected" => 1,
                "start"    => [0, 1],
                "add"      => [1, 0],
            ],
            [
                "expected" => 10,
                "start"    => [-1, 10],
                "add"      => [0, 9],
            ],
            [
                "expected" => 10001,
                "start"    => [0, 1],
                "add"      => [0, 10000.0],
            ],
        ];

        foreach ($list as $data) {
            $value1 = new Value($data["start"][1], $data["start"][0]);
            $value2 = new Value($data["add"][1], $data["add"][0]);

            $value1->add($value2);

            self::assertIsInt($value1->getValue());
            self::assertSame($data["expected"], $value1->getValue());
        }
    }
}
