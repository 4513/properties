<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\Pure;
use MiBo\Properties\Units\Area\Are;
use MiBo\Properties\Units\Area\DecAre;
use MiBo\Properties\Units\Area\HectAre;
use MiBo\Properties\Units\Pure\NoUnit;
use PHPUnit\Framework\TestCase;

/**
 * Trait NotTraitedUnitsTest
 *
 * @package MiBo\Properties\Tests\Core\Units
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class NotTraitedUnitsTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Units\Pure\NoUnit::getQuantityClassName
     * @covers \MiBo\Properties\Units\Area\Are::getQuantityClassName
     * @covers \MiBo\Properties\Units\Area\HectAre::getName
     * @covers \MiBo\Properties\Units\Area\DecAre::getName
     *
     * @return void
     */
    public function test(): void
    {
        $this->assertSame(Pure::class, NoUnit::getQuantityClassName());
        $this->assertSame(Area::class, Are::getQuantityClassName());
        $this->assertSame("hectare", HectAre::get()->getName());
        $this->assertSame("decare", DecAre::get()->getName());
    }
}
