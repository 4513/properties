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
use MiBo\Properties\Units\Volume\USFluidOunce;
use MiBo\Properties\Units\Volume\USGallon;
use MiBo\Properties\Units\Volume\USGill;
use MiBo\Properties\Units\Volume\USPint;
use MiBo\Properties\Units\Volume\USQuart;
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
     *
     * @return void
     */
    public function test(): void
    {
        $unit = CubicMeter::get();
        $this->assertTrue($unit->isSI());
        $this->assertSame('m³', $unit->getSymbol());
        $this->assertSame('cubic meter', $unit->getName());
        $this->assertSame(0, $unit->getMultiplier());
        $this->assertSame(Volume::class, $unit::getQuantityClassName());

        $this->assertSame("mm³", CubicMilliMeter::get()->getSymbol());
        $this->assertSame("cubic millimeter", CubicMilliMeter::get()->getName());
    }
}
