<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests\Core\Volume;

use MiBo\Properties\Units\Volume\CubicMeter;
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
    }
}
