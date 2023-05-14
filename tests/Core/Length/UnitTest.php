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
     *
     * @return void
     */
    public function testLengths(): void
    {
        $this->assertSame(0, Meter::get()->getMultiplier());
        $this->assertSame(Length::class, AstronomicalUnit::getQuantityClassName());
    }
}
