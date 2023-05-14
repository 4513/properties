<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\Area;

use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Units\Area\Acre;
use MiBo\Properties\Units\Area\Are;
use MiBo\Properties\Units\Area\Bovate;
use MiBo\Properties\Units\Area\Carucate;
use MiBo\Properties\Units\Area\DecAre;
use MiBo\Properties\Units\Area\HectAre;
use MiBo\Properties\Units\Area\Rood;
use MiBo\Properties\Units\Area\Section;
use MiBo\Properties\Units\Area\SquareAttoMeter;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Area\SurveyTownship;
use MiBo\Properties\Units\Area\Virgate;
use PHPUnit\Framework\TestCase;

/**
 * Class UnitTest
 *
 * @package MiBo\Properties\Tests\Area
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class UnitTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Units\Area\SquareMeter::get
     * @covers \MiBo\Properties\Units\Area\SquareMeter::getMultiplier
     * @covers \MiBo\Properties\Units\Area\SquareMeter::getSymbol
     * @covers \MiBo\Properties\Units\Area\SquareMeter::getName
     * @covers \MiBo\Properties\Units\Area\SquareMeter::getQuantityClassName
     * @covers \MiBo\Properties\Units\Area\DecAre::getName
     * @covers \MiBo\Properties\Units\Area\HectAre::getName
     *
     * @return void
     */
    public function test(): void
    {
        $unit = SquareMeter::get();

        $this->assertSame("m²", $unit->getSymbol());
        $this->assertSame("square meter", $unit->getName());
        $this->assertSame(0, $unit->getMultiplier());
        $this->assertSame(Area::class, $unit->getQuantityClassName());
        $this->assertSame(-18, SquareAttoMeter::get()->getMultiplier());
        $this->assertSame(2, Are::get()->getMultiplier());
        $this->assertSame("decare", DecAre::get()->getName());
        $this->assertSame("hectare", HectAre::get()->getName());
        $this->assertSame(-3, Rood::get()->getMultiplier());
        $this->assertSame(-3, Acre::get()->getMultiplier());
        $this->assertSame(3, Bovate::get()->getMultiplier());
        $this->assertSame(3, Virgate::get()->getMultiplier());
        $this->assertSame(3, Carucate::get()->getMultiplier());
        $this->assertSame(0, Section::get()->getMultiplier());
        $this->assertSame(0, SurveyTownship::get()->getMultiplier());
    }
}
