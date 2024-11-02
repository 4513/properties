<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Units;

use MiBo\Properties\Quantities\PerUnit;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\PerUnit\PerNotSpecified;
use MiBo\Properties\Units\Time\Second;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;
use ValueError;

/**
 * Class NoUnitTest
 *
 * @package MiBo\Properties\Tests\Core\Units
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(PerNotSpecified::class)]
#[Small]
class NoUnitTest extends TestCase
{
    public function testNoUnit(): void
    {
        $unit = PerNotSpecified::get(Meter::get(), Second::get());

        self::assertTrue($unit->getDivisor()->is(Second::get()));
        self::assertTrue($unit->getDividend()->is(Meter::get()));

        self::assertSame(PerUnit::class, $unit::getQuantityClassName());
        self::assertSame(1, $unit->getDivisorMultiplier());
        self::assertTrue(Second::get()->is($unit->getDivisor()));
        self::assertTrue(Meter::get()->is($unit->getDividend()));
        self::assertSame("meter per second", $unit->getName());
        self::assertSame("m/s", $unit->getSymbol());

        $unit->setDivisorMultiplier(2);

        self::assertSame("meter per 2 second", $unit->getName());
        self::assertSame("m/2 s", $unit->getSymbol());

        $unit2 = PerNotSpecified::get(Meter::get(), Second::get());
        self::assertTrue($unit2->is($unit));

        $unit3 = PerNotSpecified::get(Second::get(), Meter::get());
        self::assertFalse($unit3->is($unit));

        $this->expectException(ValueError::class);
        PerNotSpecified::get();
    }
}
