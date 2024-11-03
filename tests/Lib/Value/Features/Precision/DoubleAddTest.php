<?php

declare(strict_types = 1);

namespace Lib\Value\Features\Precision;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class DoubleAddTest
 *
 * @package Lib\Value\Features\Precision
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class DoubleAddTest extends TestCase
{
    #[DataProvider('getData')]
    public function testAdding(int $expectedResult, int $a, int $b): void
    {
        $expectedResult = round($expectedResult * 10 ** -2, 2);

        $value = new Value($a, -2, 2);

        $value->add($b, -2);

        self::assertEquals($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testAddingValue(int $expectedResult, int $a, int $b): void
    {
        $expectedResult = round($expectedResult * 10 ** -2, 2);

        $value = new Value($a, -2, 2);

        $value->add(new Value($b, -2, 2));

        self::assertEquals($expectedResult, $value->getValue());
    }

    public static function getData(): \Generator
    {
        foreach (require __DIR__ . '/../../../../Data/add-two-int.php' as $data) {
            yield $data;
        }
    }
}
