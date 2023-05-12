<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\Calculators;

use MiBo\Properties\Length;
use MiBo\Properties\Units\Length\Meter;
use PHPUnit\Framework\TestCase;

/**
 * Class FromPropertyTest
 *
 * @package MiBo\Properties\Tests\Calculators
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\NumericalProperty
 */
class FromPropertyTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::add
     * @covers ::subtract
     * @covers ::multiply
     * @covers ::divide
     * @covers ::round
     *
     * @return void
     */
    public function test(): void
    {
        $property = new Length(1, Meter::get());

        $this->assertEquals(1, $property->getValue());
        $property->add(10);

        $this->assertEquals(11, $property->getValue());

        $property->subtract(6);
        $this->assertEquals(5, $property->getValue());

        $property->multiply(2);
        $this->assertEquals(10, $property->getValue());

        $property->divide(5);
        $this->assertEquals(2, $property->getValue());

        $property->round(1);
        $this->assertEquals(2, $property->getValue());
    }
}
