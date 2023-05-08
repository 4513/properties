<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\Core\Length;

use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Units\Length\AstronomicalUnit;
use MiBo\Properties\Units\Length\Barleycorn;
use MiBo\Properties\Units\Length\Cable;
use MiBo\Properties\Units\Length\Chain;
use MiBo\Properties\Units\Length\Cubit;
use MiBo\Properties\Units\Length\Digit;
use MiBo\Properties\Units\Length\Ell;
use MiBo\Properties\Units\Length\Fathom;
use MiBo\Properties\Units\Length\Finger;
use MiBo\Properties\Units\Length\Foot;
use MiBo\Properties\Units\Length\Furlong;
use MiBo\Properties\Units\Length\Hand;
use MiBo\Properties\Units\Length\Inch;
use MiBo\Properties\Units\Length\League;
use MiBo\Properties\Units\Length\Line;
use MiBo\Properties\Units\Length\Link;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Length\Mile;
use MiBo\Properties\Units\Length\Nail;
use MiBo\Properties\Units\Length\NauticalMile;
use MiBo\Properties\Units\Length\Palm;
use MiBo\Properties\Units\Length\Pica;
use MiBo\Properties\Units\Length\Point;
use MiBo\Properties\Units\Length\Rod;
use MiBo\Properties\Units\Length\Shaftment;
use MiBo\Properties\Units\Length\Span;
use MiBo\Properties\Units\Length\Thou;
use MiBo\Properties\Units\Length\Twip;
use MiBo\Properties\Units\Length\Yard;
use PHPUnit\Framework\TestCase;

/**
 * Class UnitTests
 *
 * @package MiBo\Properties\Tests\Core\Length
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
     * @covers \MiBo\Properties\Units\Length\Meter::get
     * @covers \MiBo\Properties\Units\Length\Meter::__construct
     * @covers \MiBo\Properties\Units\Length\Meter::getMultiplier
     * @covers \MiBo\Properties\Units\Length\AstronomicalUnit::__construct
     * @covers \MiBo\Properties\Units\Length\AstronomicalUnit::getMultiplier
     * @covers \MiBo\Properties\Units\Length\AstronomicalUnit::getQuantityClassName
     * @covers \MiBo\Properties\Units\Length\Barleycorn::__construct
     * @covers \MiBo\Properties\Units\Length\Chain::__construct
     * @covers \MiBo\Properties\Units\Length\Foot::__construct
     * @covers \MiBo\Properties\Units\Length\Furlong::__construct
     * @covers \MiBo\Properties\Units\Length\Hand::__construct
     * @covers \MiBo\Properties\Units\Length\Inch::__construct
     * @covers \MiBo\Properties\Units\Length\League::__construct
     * @covers \MiBo\Properties\Units\Length\Mile::__construct
     * @covers \MiBo\Properties\Units\Length\Thou::__construct
     * @covers \MiBo\Properties\Units\Length\Twip::__construct
     * @covers \MiBo\Properties\Units\Length\Yard::__construct
     * @covers \MiBo\Properties\Units\Length\Line::__construct
     * @covers \MiBo\Properties\Units\Length\Digit::__construct
     * @covers \MiBo\Properties\Units\Length\Finger::__construct
     * @covers \MiBo\Properties\Units\Length\Nail::__construct
     * @covers \MiBo\Properties\Units\Length\Palm::__construct
     * @covers \MiBo\Properties\Units\Length\Shaftment::__construct
     * @covers \MiBo\Properties\Units\Length\Link::__construct
     * @covers \MiBo\Properties\Units\Length\Span::__construct
     * @covers \MiBo\Properties\Units\Length\Cubit::__construct
     * @covers \MiBo\Properties\Units\Length\Ell::__construct
     * @covers \MiBo\Properties\Units\Length\Fathom::__construct
     * @covers \MiBo\Properties\Units\Length\Rod::__construct
     * @covers \MiBo\Properties\Units\Length\Point::__construct
     * @covers \MiBo\Properties\Units\Length\Pica::__construct
     * @covers \MiBo\Properties\Units\Length\Cable::__construct
     * @covers \MiBo\Properties\Units\Length\NauticalMile::__construct
     *
     * @return void
     */
    public function testLengths(): void
    {
        $this->assertSame(1, Meter::get()->getMultiplier());
        $this->assertSame(149_597_870_700, AstronomicalUnit::get()->getMultiplier());
        $this->assertSame(Length::class, AstronomicalUnit::getQuantityClassName());
        $this->assertSame(84_667*(10**-7), Barleycorn::get()->getMultiplier());
        $this->assertSame(201_168*(10**-4), Chain::get()->getMultiplier());
        $this->assertSame(3_048*(10**-4), Foot::get()->getMultiplier());
        $this->assertSame(201_168*(10**-3), Furlong::get()->getMultiplier());
        $this->assertSame(1_016*(10**-4), Hand::get()->getMultiplier());
        $this->assertSame(254*(10**-4), Inch::get()->getMultiplier());
        $this->assertSame(4_828_032*(10**-3), League::get()->getMultiplier());
        $this->assertSame(1_609_334*(10**-3), Mile::get()->getMultiplier());
        $this->assertSame(254*(10**-7), Thou::get()->getMultiplier());
        $this->assertSame(176_389*(10**-10), Twip::get()->getMultiplier());
        $this->assertSame(9_144*(10**-4), Yard::get()->getMultiplier());
        $this->assertSame(655*(10**-5), Line::get()->getMultiplier());
        $this->assertSame(19*(10**-3), Digit::get()->getMultiplier());
        $this->assertSame(1_905*(10**-5), Finger::get()->getMultiplier());
        $this->assertSame(5_715*(10**-5), Nail::get()->getMultiplier());
        $this->assertSame(762*(10**-4), Palm::get()->getMultiplier());
        $this->assertSame(1_524*(10**-4), Shaftment::get()->getMultiplier());
        $this->assertSame(2_012*(10**-4), Link::get()->getMultiplier());
        $this->assertSame(2_286*(10**-4), Span::get()->getMultiplier());
        $this->assertSame(8_866*(10**-4), Cubit::get()->getMultiplier());
        $this->assertSame(1_143*(10**-3), Ell::get()->getMultiplier());
        $this->assertSame(18_288*(10**-4), Fathom::get()->getMultiplier());
        $this->assertSame(50_292*(10**-4), Rod::get()->getMultiplier());
        $this->assertSame(352_778*(10**-9), Point::get()->getMultiplier());
        $this->assertSame(4_233*(10**-6), Pica::get()->getMultiplier());
        $this->assertSame(219_456*(10**-3), Cable::get()->getMultiplier());
        $this->assertSame(1_852, NauticalMile::get()->getMultiplier());
    }
}
