<?php

declare(strict_types=1);

namespace Lib\Value\Features\Adding;

use Generator;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class AddFloatToFloatTest
 *
 * @package Lib\Value\Features\Adding
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class AddFloatToFloatTest extends TestCase
{
    #[DataProvider('getData')]
    public function testAdding(int|float $expectedResult, float $a, float $b): void
    {
        Value::$floatExp = 5;

        $value = new Value($a);

        $value->add($b);

        self::assertEquals($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testAddingValue(int|float $expectedResult, float $a, float $b): void
    {
        Value::$floatExp = 5;

        $value = new Value($a);

        $value->add(new Value($b));

        self::assertEquals($expectedResult, $value->getValue());
    }

    public static function getData(): Generator
    {
        foreach (require __DIR__ . '/../../../../Data/add-two-float.php' as $data) {
            yield $data;
        }
    }
}
