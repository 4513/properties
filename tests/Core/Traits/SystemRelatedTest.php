<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Traits;

use MiBo\Properties\Units\Length\AstronomicalUnit;
use MiBo\Properties\Units\Length\Meter;
use MiBo\Properties\Units\Length\Mile;
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
class SystemRelatedTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Traits\AcceptedBySIUnit::acceptedForUseWithSI
     * @covers \MiBo\Properties\Traits\AstronomicalUnit::isAstronomical
     * @covers \MiBo\Properties\Traits\EnglishUnit::isEnglish
     * @covers \MiBo\Properties\Traits\ImperialUnit::isImperial
     * @covers \MiBo\Properties\Traits\InternationalSystemUnit::isSI
     * @covers \MiBo\Properties\Traits\MetricUnit::isMetric
     * @covers \MiBo\Properties\Traits\NotAcceptedBySIUnit::acceptedForUseWithSI
     * @covers \MiBo\Properties\Traits\NotAstronomicalUnit::isAstronomical
     * @covers \MiBo\Properties\Traits\NotEnglishUnit::isEnglish
     * @covers \MiBo\Properties\Traits\NotImperialUnit::isImperial
     * @covers \MiBo\Properties\Traits\NotInternationalSystemUnit::isSI
     * @covers \MiBo\Properties\Traits\NotMetricUnit::isMetric
     * @covers \MiBo\Properties\Traits\NotUSCustomaryUnit::isUSCustomary
     * @covers \MiBo\Properties\Traits\USCustomaryUnit::isUSCustomary
     *
     * @return void
     */
    public function test(): void
    {
        $meter = Meter::get();

        $this->assertTrue($meter->acceptedForUseWithSI());
        $this->assertTrue($meter->isSI());
        $this->assertTrue($meter->isMetric());
        $this->assertFalse($meter->isImperial());
        $this->assertFalse($meter->isAstronomical());
        $this->assertFalse($meter->isUSCustomary());
        $this->assertFalse($meter->isEnglish());

        $mile = Mile::get();

        $this->assertFalse($mile->acceptedForUseWithSI());
        $this->assertFalse($mile->isSI());
        $this->assertFalse($mile->isMetric());
        $this->assertTrue($mile->isImperial());
        $this->assertFalse($mile->isAstronomical());
        $this->assertTrue($mile->isUSCustomary());
        $this->assertTrue($mile->isEnglish());

        $astro = AstronomicalUnit::get();

        $this->assertTrue($astro->isAstronomical());
        $this->assertTrue($astro->acceptedForUseWithSI());
    }
}
