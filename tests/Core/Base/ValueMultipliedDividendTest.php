<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ValueMultipliedDividendTest
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
class ValueMultipliedDividendTest extends TestCase
{
    public function test(): void
    {
        $value = new Value(10, 10);

        $value->divide(2,10);

        self::assertSame(5, $value->getValue());

        $values = $value->getValues();

        $value->multiply(2);

        self::assertSame(10, $value->getValue());
        self::assertSame($values, $value->getValues());
    }
}
