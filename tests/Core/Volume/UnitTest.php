<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\Core\Volume;

use MiBo\Properties\Quantities\Volume;
use MiBo\Properties\Units\Volume\AcreFoot;
use MiBo\Properties\Units\Volume\Barrel;
use MiBo\Properties\Units\Volume\CubicMeter;
use MiBo\Properties\Units\Volume\CubicMilliMeter;
use MiBo\Properties\Units\Volume\ImperialFluidOunce;
use MiBo\Properties\Units\Volume\ImperialGallon;
use MiBo\Properties\Units\Volume\ImperialGill;
use MiBo\Properties\Units\Volume\ImperialPint;
use MiBo\Properties\Units\Volume\ImperialQuart;
use MiBo\Properties\Units\Volume\Liter;
use PHPUnit\Framework\TestCase;

/**
 * Class UnitTest
 *
 * @package MiBo\Properties\Tests\Core\Volume
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Units\Volume\CubicMeter
 */
class UnitTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::getSymbol
     * @covers ::getMultiplier
     * @covers ::getName
     * @covers \MiBo\Properties\Traits\UnitForVolume::getQuantityClassName
     * @covers \MiBo\Properties\Units\Volume\AcreFoot::__construct
     * @covers \MiBo\Properties\Units\Volume\Barrel::__construct
     * @covers \MiBo\Properties\Units\Volume\ImperialFluidOunce::__construct
     * @covers \MiBo\Properties\Units\Volume\ImperialGallon::__construct
     * @covers \MiBo\Properties\Units\Volume\ImperialGill::__construct
     * @covers \MiBo\Properties\Units\Volume\ImperialPint::__construct
     * @covers \MiBo\Properties\Units\Volume\ImperialQuart::__construct
     * @covers \MiBo\Properties\Units\Volume\Liter::__construct
     *
     * @return void
     */
    public function test(): void
    {
        $unit = CubicMeter::get();
        $this->assertTrue($unit->isSI());
        $this->assertSame('m³', $unit->getSymbol());
        $this->assertSame('cubic meter', $unit->getName());
        $this->assertSame(1, $unit->getMultiplier());
        $this->assertSame(Volume::class, $unit::getQuantityClassName());
        $this->assertSame(1_233.5, AcreFoot::get()->getMultiplier());
        $this->assertSame(119_240_471_196 * (10 ** -12), Barrel::get()->getMultiplier());
        $this->assertSame(284_130_625 * (10 ** -13), ImperialFluidOunce::get()->getMultiplier());
        $this->assertSame(454_609 * (10 ** -8), ImperialGallon::get()->getMultiplier());
        $this->assertSame(1_420_653_125 * (10 ** -13), ImperialGill::get()->getMultiplier());
        $this->assertSame(56_826_125 * (10 ** -11), ImperialPint::get()->getMultiplier());
        $this->assertSame(11_365_225 * (10 ** -10), ImperialQuart::get()->getMultiplier());
        $this->assertSame(10 ** -3, Liter::get()->getMultiplier());

        $this->assertSame("mm³", CubicMilliMeter::get()->getSymbol());
        $this->assertSame("cubic millimeter", CubicMilliMeter::get()->getName());
    }
}
