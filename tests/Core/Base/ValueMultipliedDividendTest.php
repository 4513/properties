<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
use PHPUnit\Framework\TestCase;

/**
 * Class TestMultipliedDividentTest
 *
 * @package MiBo\Properties\Tests\Base
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Value
 */
class ValueMultipliedDividendTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::multiply
     * @covers ::divide
     *
     * @return void
     */
    public function test(): void
    {
        $value = new Value(10, 10);

        $value->divide(2,10);

        $this->assertSame(5, $value->getValue());

        $values = $value->getValues();

        $value->multiply(2);

        $this->assertSame(10, $value->getValue());
        $this->assertSame($values, $value->getValues());
    }
}
