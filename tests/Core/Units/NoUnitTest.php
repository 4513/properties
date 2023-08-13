<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Quantities\PerUnit;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\PerUnit\PerNotSpecified;
use MiBo\Properties\Units\Time\Second;
use PHPUnit\Framework\TestCase;
use ValueError;

/**
 * Class NoUnitTest
 *
 * @package MiBo\Properties\Tests\Core\Units
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Units\PerUnit\PerNotSpecified
 */
class NoUnitTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::get
     * @covers ::__construct
     * @covers ::getDivisor
     * @covers ::getDividend
     * @covers ::getQuantityClassName
     * @covers ::getDivisorMultiplier
     * @covers ::getName
     * @covers ::getSymbol
     * @covers ::setDivisorMultiplier
     * @covers ::is
     *
     * @return void
     */
    public function testNoUnit(): void
    {
        $unit = PerNotSpecified::get(Meter::get(), Second::get());

        $this->assertTrue($unit->getDivisor()->is(Second::get()));
        $this->assertTrue($unit->getDividend()->is(Meter::get()));

        $this->assertSame(PerUnit::class, $unit::getQuantityClassName());
        $this->assertSame(1, $unit->getDivisorMultiplier());
        $this->assertTrue(Second::get()->is($unit->getDivisor()));
        $this->assertTrue(Meter::get()->is($unit->getDividend()));
        $this->assertSame("meter per second", $unit->getName());
        $this->assertSame("m/s", $unit->getSymbol());

        $unit->setDivisorMultiplier(2);

        $this->assertSame("meter per 2 second", $unit->getName());
        $this->assertSame("m/2 s", $unit->getSymbol());

        $unit2 = PerNotSpecified::get(Meter::get(), Second::get());
        $this->assertTrue($unit2->is($unit));

        $unit3 = PerNotSpecified::get(Second::get(), Meter::get());
        $this->assertFalse($unit3->is($unit));

        $this->expectException(ValueError::class);
        PerNotSpecified::get();
    }
}
