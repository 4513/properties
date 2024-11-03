<?php

declare(strict_types = 1);

namespace Lib\Value\Features\SteppedPrecision;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class EachFifthTest
 *
 * @package Lib\Value\Features\SteppedPrecision
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class EachFifthTest extends TestCase
{
    #[DataProvider('getData')]
    public function testCreating(int $expectedResult, int $input): void
    {
        self::assertSame(
            $expectedResult,
            (new Value($input, 0, -1.5))->getValue()
        );
    }

    public static function getData(): \Generator
    {
        for ($i = -16; $i <= 31; $i++) {
            $isNegative = $i < 0;
            $abs = abs($i);
            $secondGoesUp = false;
            $expEnd = 0;

            if (preg_match('/[34567]$/', (string) $abs) === 1) {
                $expEnd = 5;
            } elseif (preg_match('/[89]$/', (string) $abs) === 1) {
                $secondGoesUp = true;
            }

            $hasTens = preg_match('/\d*(\d)\d/', (string) $abs, $ten);
            $ten     = $hasTens === 1 ? $ten[1] : 0;
            $ten     = $secondGoesUp ? $ten + 1 : $ten;

            $expectedResult = $abs > 9
                ? preg_replace('/\d\d$/', $ten . $expEnd, (string) $abs)
                : preg_replace('/\d$/', $ten . $expEnd, (string) $abs);
            $expectedResult = $isNegative ? '-' . $expectedResult : $expectedResult;

            yield [
                (int) $expectedResult,
                $i,
            ];
        }
    }
}
