<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Base;

use MiBo\Properties\Value;
use PHPUnit\Framework\TestCase;

/**
 * Class ValueTest
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
class ValueTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::getValues
     * @covers ::getMinExp
     * @covers ::getBase
     *
     * @return void
     */
    public function testBasics(): void
    {
        $list = [
            10 => [0, 10],
            100 => [1, 10],
            9000 => [3, 9],
            0  => [9, 0],
        ];

        foreach ($list as $expected => $values) {
            $value = new Value($values[1], $values[0]);

            $this->assertSame($expected, $value->getValue());

            $expected !== 0 ?
                $this->assertSame([$values[0] => $values[1]], $value->getValues()) :
                $this->assertSame([], $value->getValues());

            $expected !== 0 ?
                $this->assertSame($values[0], $value->getMinExp()) :
                $this->assertSame(0, $value->getMinExp());

            $this->assertSame(10, $value->getBase());
        }
    }
}
