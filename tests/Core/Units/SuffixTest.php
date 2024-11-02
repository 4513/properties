<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Area;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Volume\CubicMeter;
use MiBo\Properties\Volume;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
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
#[CoversClass(SquareMeter::class)]
#[CoversClass(CubicMeter::class)]
#[Small]
class SuffixTest extends TestCase
{
    public function testSquare(): void
    {
        $property = new Area(1, SquareMeter::get());

        self::assertSame("m²", $property->getUnit()->getSymbol());
        self::assertSame("square meter", $property->getUnit()->getName());
    }

    public function testCubic(): void
    {
        $property = new Volume(1, CubicMeter::get());

        self::assertSame("m³", $property->getUnit()->getSymbol());
        self::assertSame("cubic meter", $property->getUnit()->getName());
    }
}
