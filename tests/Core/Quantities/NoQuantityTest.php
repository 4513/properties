<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Quantities;

use MiBo\Properties\Area;
use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Length;
use MiBo\Properties\PerUnit;
use MiBo\Properties\Units\Area\SquareMeter;
use MiBo\Properties\Units\Length\Meter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;
use ValueError;

/**
 * Class NoQuantityTest
 *
 * @package MiBo\Properties\Tests\Core\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(PropertyCalc::class)]
#[Small]
class NoQuantityTest extends TestCase
{
    public function testMath(): void
    {
        $length = new Length(10, Meter::get());
        $area   = new Area(10, SquareMeter::get());
        $result = $length->divide($area);

        self::assertInstanceOf(PerUnit::class, $result);
    }

    public function testMathError(): void
    {
        $area  = new Area(10, SquareMeter::get());
        $area2 = new Area(10, SquareMeter::get());

        $this->expectException(ValueError::class);
        $area->multiply($area2);
    }
}
