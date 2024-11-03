<?php

declare(strict_types=1);

namespace Lib\Value\Features\Subtracting;

use Generator;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class SubtractIntFromIntTest
 *
 * @package Lib\Value\Features\Subtracting
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class SubtractIntFromIntTest extends TestCase
{
    #[DataProvider('getData')]
    public function testAdding(int $a, int $b, int $expectedResult): void
    {
        $value = new Value($a);

        $value->subtract($b);

        self::assertSame($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testAddingReversed(int $a, int $expectedResult, int $b): void
    {
        $value = new Value($a);

        $value->subtract($b);

        self::assertSame($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testAddingValue(int $a, int $b, int $expectedResult): void
    {
        $value = new Value($a);

        $value->subtract(new Value($b));

        self::assertSame($expectedResult, $value->getValue());
    }

    public static function getData(): Generator
    {
        foreach (require __DIR__ . '/../../../../Data/add-two-int.php' as $data) {
            yield $data;
        }
    }
}
