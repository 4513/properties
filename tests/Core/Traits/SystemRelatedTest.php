<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Traits;

use MiBo\Properties\Traits\AcceptedBySIUnit;
use MiBo\Properties\Traits\EnglishUnit;
use MiBo\Properties\Traits\ImperialUnit;
use MiBo\Properties\Traits\InternationalSystemUnit;
use MiBo\Properties\Traits\MetricUnit;
use MiBo\Properties\Traits\NotAcceptedBySIUnit;
use MiBo\Properties\Traits\NotAstronomicalUnit;
use MiBo\Properties\Traits\NotEnglishUnit;
use MiBo\Properties\Traits\NotImperialUnit;
use MiBo\Properties\Traits\NotInternationalSystemUnit;
use MiBo\Properties\Traits\NotMetricUnit;
use MiBo\Properties\Traits\NotUSCustomaryUnit;
use MiBo\Properties\Traits\USCustomaryUnit;
use MiBo\Properties\Units\Length\AstronomicalUnit;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Length\Mile;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class SystemRelatedTest
 *
 * @package MiBo\Properties\Tests\Core\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(AcceptedBySIUnit::class)]
#[CoversClass(AstronomicalUnit::class)]
#[CoversClass(EnglishUnit::class)]
#[CoversClass(ImperialUnit::class)]
#[CoversClass(InternationalSystemUnit::class)]
#[CoversClass(MetricUnit::class)]
#[CoversClass(NotAcceptedBySIUnit::class)]
#[CoversClass(NotAstronomicalUnit::class)]
#[CoversClass(NotEnglishUnit::class)]
#[CoversClass(NotImperialUnit::class)]
#[CoversClass(NotInternationalSystemUnit::class)]
#[CoversClass(NotMetricUnit::class)]
#[CoversClass(NotUSCustomaryUnit::class)]
#[CoversClass(USCustomaryUnit::class)]
#[Small]
class SystemRelatedTest extends TestCase
{
    public function test(): void
    {
        $meter = Meter::get();

        self::assertTrue($meter->acceptedForUseWithSI());
        self::assertTrue($meter->isSI());
        self::assertTrue($meter->isMetric());
        self::assertFalse($meter->isImperial());
        self::assertFalse($meter->isAstronomical());
        self::assertFalse($meter->isUSCustomary());
        self::assertFalse($meter->isEnglish());

        $mile = Mile::get();

        self::assertFalse($mile->acceptedForUseWithSI());
        self::assertFalse($mile->isSI());
        self::assertFalse($mile->isMetric());
        self::assertTrue($mile->isImperial());
        self::assertFalse($mile->isAstronomical());
        self::assertTrue($mile->isUSCustomary());
        self::assertTrue($mile->isEnglish());

        $astro = AstronomicalUnit::get();

        self::assertTrue($astro->isAstronomical());
        self::assertTrue($astro->acceptedForUseWithSI());
    }
}
