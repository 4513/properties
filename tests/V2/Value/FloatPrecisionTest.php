<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\V2\Value;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class FloatPrecisionTest
 *
 * @package MiBo\Properties\Tests\V2\Value
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.2
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Value::class)]
#[Small]
final class FloatPrecisionTest extends TestCase
{
    #[DataProvider('getData')]
    public function testPrecision(
        float|int $expectedResult,
        float|int $initialValue,
        int $exp,
        int|float $precision,
        \Closure $addCallback
    ): void
    {
        $value = new Value($initialValue, $exp, $precision);

        self::assertSame($expectedResult, $value->getValue());

        $addCallback($this, $value);
    }

    public static function getData(): array
    {
        return [
            [
                10,
                10.0,
                0,
                0,
                static function (): void {
                },
            ],
            [
                10,
                10.0,
                0,
                0.5,
                static function (): void {
                },
            ],
            [
                5,
                5,
                0,
                0.5,
                static function (): void {
                },
            ],
            [
                0.1,
                0.09,
                0,
                1,
                static function (): void {
                },
            ],
            [
                0,
                0.09,
                0,
                0,
                static function (): void {
                },
            ],
            [
                0,
                0.09,
                0,
                0.5,
                static function (): void {
                },
            ],
            [
                0.1,
                0.09,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0.05,
                0.06,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0,
                0,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                0,
                1,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                0,
                2,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                5,
                3,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                5,
                4,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                5,
                6,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                5,
                7,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                10,
                8,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                10,
                9,
                0,
                -1.5,
                static function (): void {
                },
            ],
            [
                0,
                0.00,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0,
                0.01,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0,
                0.02,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0.05,
                0.03,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0.05,
                0.04,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0.05,
                0.06,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0.05,
                0.07,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0.1,
                0.08,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                0.1,
                0.09,
                0,
                1.5,
                static function (): void {
                },
            ],
            [
                5,
                0.4,
                1,
                -1.5,
                static function (): void {
                },
            ],
            [
                4,
                3,
                0,
                -1.2,
                static function (): void {
                },
            ],
            [
                3,
                3,
                0,
                -1.3,
                static function (): void {
                },
            ],
            [
                9,
                9,
                0,
                -1.3,
                static function (): void {
                },
            ],
            [
                9,
                10,
                0,
                -1.3,
                static function (): void {
                },
            ],
            [
                12,
                11,
                0,
                -1.3,
                static function (): void {
                },
            ],
            [
                12,
                13,
                0,
                -1.3,
                static function (): void {
                },
            ],
        ];
    }
}
