<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Properties;

use MiBo\Properties\Length;
use MiBo\Properties\PerUnit;
use MiBo\Properties\Time;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\PerUnit\PerNotSpecified;
use MiBo\Properties\Units\Time\Second;
use PHPUnit\Framework\TestCase;

/**
 * Class PerUnitTest
 *
 * @package MiBo\Properties\Tests\Core\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\PerUnit
 */
class PerUnitTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::getUnit
     * @covers ::getNumericalValue
     * @covers ::perAmount
     *
     * @return void
     */
    public function test(): void
    {
        $second = new Time(10, Second::get());
        $meter  = new Length(5, Meter::get());
        $per    = new PerUnit($second, $meter);

        $this->assertTrue($per->getUnit()->is(PerNotSpecified::get(Second::get(), Meter::get())));

        $this->assertSame(2, $per->getNumericalValue()->getValue());
        $per->perAmount(2);
        $this->assertSame(1, $per->getNumericalValue()->getValue());
;    }
}
