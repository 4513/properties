<?php

declare(strict_types=1);

namespace Lib\Value\Features\Multiplying;

use Generator;
use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class MultiplyIntWithIntTest
 *
 * @package Lib\Value\Features\Multiplying
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class MultiplyIntWithIntTest extends TestCase
{
    #[DataProvider('getData')]
    public function testAdding(int $expectedResult, int $a, int $b): void
    {
        $value = new Value($a);

        $value->multiply($b);

        self::assertSame($expectedResult, $value->getValue());
    }

    #[DataProvider('getData')]
    public function testAddingValue(int $expectedResult, int $a, int $b): void
    {
        $value = new Value($a);

        $value->multiply(new Value($b));

        self::assertSame($expectedResult, $value->getValue());
    }

    public static function getData(): Generator
    {
        foreach (require __DIR__ . '/../../../../Data/multi-two-int.php' as $data) {
            yield $data;
        }
    }
}
