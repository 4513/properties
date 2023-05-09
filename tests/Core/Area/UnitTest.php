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
     * @covers \MiBo\Properties\Units\Area\Are::__construct
     * @covers \MiBo\Properties\Units\Area\DecAre::getName
     * @covers \MiBo\Properties\Units\Area\HectAre::getName
     * @covers \MiBo\Properties\Units\Area\Rood::__construct
     * @covers \MiBo\Properties\Units\Area\Acre::__construct
     * @covers \MiBo\Properties\Units\Area\Bovate::__construct
     * @covers \MiBo\Properties\Units\Area\Virgate::__construct
     * @covers \MiBo\Properties\Units\Area\Carucate::__construct
     * @covers \MiBo\Properties\Units\Area\Section::__construct
     * @covers \MiBo\Properties\Units\Area\SurveyTownship::__construct
     *
     * @return void
     */
    public function test(): void
    {
        $unit = SquareMeter::get();

        $this->assertSame("m²", $unit->getSymbol());
        $this->assertSame("square meter", $unit->getName());
        $this->assertSame(1**2, $unit->getMultiplier());
        $this->assertSame(Area::class, $unit->getQuantityClassName());
        $this->assertSame((10 ** -18), SquareAttoMeter::get()->getMultiplier());
        $this->assertSame(10 ** 2.0, Are::get()->getMultiplier());
        $this->assertSame("decare", DecAre::get()->getName());
        $this->assertSame("hectare", HectAre::get()->getName());
        $this->assertSame(1_011_714 * (10 ** -3), Rood::get()->getMultiplier());
        $this->assertSame(4_046_873 * (10 ** -3), Acre::get()->getMultiplier());
        $this->assertSame(60 * (10 ** 3), Bovate::get()->getMultiplier());
        $this->assertSame(120 * (10 ** 3), Virgate::get()->getMultiplier());
        $this->assertSame(490 * (10 ** 3), Carucate::get()->getMultiplier());
        $this->assertSame(2_589_998, Section::get()->getMultiplier());
        $this->assertSame(93_239_930, SurveyTownship::get()->getMultiplier());
    }
}
