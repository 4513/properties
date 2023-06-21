<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Exceptions\DivisionByZeroException;
use MiBo\Properties\Value;
use PHPUnit\Framework\TestCase;

/**
 * Class ValueDivideByZeroTest
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
class ValueDivideByZeroTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::divide
     *
     * @return void
     */
    public function testZero(): void
    {
        $value = new Value(10);

        $this->expectException(DivisionByZeroException::class);

        $value->divide(0);
    }
}
