<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Area;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Volume\CubicMeter;
use MiBo\Properties\Volume;
use PHPUnit\Framework\TestCase;

/**
 * Class SuffixTest
 *
 * @package MiBo\Properties\Tests\Core\Units
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class SuffixTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Units\Area\SquareMeter::getSymbolSuffix
     * @covers \MiBo\Properties\Units\Area\SquareMeter::getNameSuffix
     *
     * @return void
     */
    public function testSquare(): void
    {
        $property = new Area(1, SquareMeter::get());

        $this->assertSame("m²", $property->getUnit()->getSymbol());
        $this->assertSame("square meter", $property->getUnit()->getName());
    }

    /**
     * @small
     *
     * @covers \MiBo\Properties\Units\Volume\CubicMeter::getSymbolSuffix
     * @covers \MiBo\Properties\Units\Volume\CubicMeter::getNameSuffix
     *
     * @return void
     */
    public function testCubic(): void
    {
        $property = new Volume(1, CubicMeter::get());

        $this->assertSame("m³", $property->getUnit()->getSymbol());
        $this->assertSame("cubic meter", $property->getUnit()->getName());
    }
}
