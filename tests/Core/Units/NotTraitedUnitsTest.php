<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\Pure;
use MiBo\Properties\Units\Area\Are;
use MiBo\Properties\Units\Area\DecAre;
use MiBo\Properties\Units\Area\HectAre;
use MiBo\Properties\Units\Pure\NoUnit;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
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
#[CoversClass(NoUnit::class)]
#[CoversClass(Are::class)]
#[CoversClass(HectAre::class)]
#[CoversClass(DecAre::class)]
#[Small]
class NotTraitedUnitsTest extends TestCase
{
    public function test(): void
    {
        self::assertSame(Pure::class, NoUnit::getQuantityClassName());
        self::assertSame(Area::class, Are::getQuantityClassName());
        self::assertSame("hectare", HectAre::get()->getName());
        self::assertSame("decare", DecAre::get()->getName());
    }
}
