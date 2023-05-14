<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Quantities;

use MiBo\Properties\Quantities\Volume;
use MiBo\Properties\Units\Volume\CubicMeter;
use MiBo\Properties\Units\Volume\Liter;
use PHPUnit\Framework\TestCase;

/**
 * Class QuantityHelperTest
 *
 * @package MiBo\Properties\Tests\Core\Quantities
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\Properties\Traits\QuantityHelper
 */
class QuantityHelperTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::getDefaultUnit
     * @covers ::setDefaultUnit
     *
     * @return void
     */
    public function test(): void
    {
        $current = Volume::getDefaultUnit();

        $previous = Volume::setDefaultUnit(Liter::get());

        $this->assertSame($current::class, $previous::class);

        $this->assertSame(Liter::class, Volume::getDefaultUnit()::class);

        Volume::setDefaultUnit($previous);
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        Volume::setDefaultUnit(CubicMeter::get());

        parent::tearDown();
    }
}
