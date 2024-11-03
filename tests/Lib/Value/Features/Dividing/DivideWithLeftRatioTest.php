<?php

declare(strict_types=1);

namespace Lib\Value\Features\Dividing;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class DivideWithLeftRatioTest
 *
 * @package Lib\Value\Features\Dividing
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class DivideWithLeftRatioTest extends TestCase
{
    #[DataProvider('getData')]
    public function testDivide(int $expectedResult, int $a, int $b): void
    {
        $value = new Value($a);

        $value->multiply(1, 1);

        $value->divide(3);

        $value->divide(1, 1);

        $value->multiply(3);

        $value->multiply($b);

        self::assertSame($expectedResult, $value->getValue());
    }

    public static function getData(): \Generator
    {
        foreach (require __DIR__ . '/../../../../Data/multi-two-int.php' as $data) {
            yield $data;
        }
    }
}
