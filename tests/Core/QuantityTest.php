<?php

declare(strict_types = 1);

namespace MiBo\Properties\Tests;

use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Units\Length\MilliMeter;
use PHPUnit\Framework\TestCase;

/**
 * Class QuantityTest
 *
 * @package MiBo\Properties\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Quantities\Length
 */
class QuantityTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::getDimensionSymbol
     * @covers ::getDefaultUnit
     * @covers ::getInitialUnit
     * @covers ::setDefaultUnit
     *
     * @return void
     */
    public function test(): void
    {
        $quantity = new Length();

        $this->assertSame("L", $quantity::getDimensionSymbol());
        $this->assertSame("m", $quantity::getDefaultUnit()->getSymbol());
        $this->assertSame("m", $quantity::setDefaultUnit(MilliMeter::get())->getSymbol());
        $this->assertSame("mm", $quantity::getDefaultUnit()->getSymbol());
    }
}
