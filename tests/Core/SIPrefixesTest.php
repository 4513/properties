<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests;

use MiBo\Properties\Length;
use PHPUnit\Framework\TestCase;

/**
 * Class SIPrefixesTest
 *
 * @package MiBo\Properties\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class SIPrefixesTest extends TestCase
{
    /**
     * @small
     *
     * @covers \MiBo\Properties\Prefixes\Yotta::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Zetta::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Exa::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Peta::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Tera::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Giga::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Mega::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Kilo::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Hecto::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Deca::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Deci::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Centi::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Milli::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Micro::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Nano::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Pico::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Femto::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Atto::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Zepto::getMultiplier
     * @covers \MiBo\Properties\Prefixes\Yocto::getMultiplier
     *
     * @return void
     */
    public function testPrefixMultiplier(): void
    {
        $this->assertSame(10**24, Length::YOTTA()->getUnit()->getMultiplier());
        $this->assertSame(10**21, Length::ZETTA()->getUnit()->getMultiplier());
        $this->assertSame(10**18, Length::EXA()->getUnit()->getMultiplier());
        $this->assertSame(10**15, Length::PETA()->getUnit()->getMultiplier());
        $this->assertSame(10**12, Length::TERA()->getUnit()->getMultiplier());
        $this->assertSame(10**9, Length::GIGA()->getUnit()->getMultiplier());
        $this->assertSame(10**6, Length::MEGA()->getUnit()->getMultiplier());
        $this->assertSame(10**3, Length::KILO()->getUnit()->getMultiplier());
        $this->assertSame(10**2, Length::HECTO()->getUnit()->getMultiplier());
        $this->assertSame(10**1, Length::DECA()->getUnit()->getMultiplier());
        $this->assertSame(10**-1, Length::DECI()->getUnit()->getMultiplier());
        $this->assertSame(10**-2, Length::CENTI()->getUnit()->getMultiplier());
        $this->assertSame(10**-3, Length::MILLI()->getUnit()->getMultiplier());
        $this->assertSame(10**-6, Length::MICRO()->getUnit()->getMultiplier());
        $this->assertSame(10**-9, Length::NANO()->getUnit()->getMultiplier());
        $this->assertSame(10**-12, Length::PICO()->getUnit()->getMultiplier());
        $this->assertSame(10**-15, Length::FEMTO()->getUnit()->getMultiplier());
        $this->assertSame(10**-18, Length::ATTO()->getUnit()->getMultiplier());
        $this->assertSame(10**-21, Length::ZEPTO()->getUnit()->getMultiplier());
        $this->assertSame(10**-24, Length::YOCTO()->getUnit()->getMultiplier());
    }

    /**
     * @small
     *
     * @covers \MiBo\Properties\Prefixes\Yotta::getName
     * @covers \MiBo\Properties\Prefixes\Zetta::getName
     * @covers \MiBo\Properties\Prefixes\Exa::getName
     * @covers \MiBo\Properties\Prefixes\Peta::getName
     * @covers \MiBo\Properties\Prefixes\Tera::getName
     * @covers \MiBo\Properties\Prefixes\Giga::getName
     * @covers \MiBo\Properties\Prefixes\Mega::getName
     * @covers \MiBo\Properties\Prefixes\Kilo::getName
     * @covers \MiBo\Properties\Prefixes\Hecto::getName
     * @covers \MiBo\Properties\Prefixes\Deca::getName
     * @covers \MiBo\Properties\Prefixes\Deci::getName
     * @covers \MiBo\Properties\Prefixes\Centi::getName
     * @covers \MiBo\Properties\Prefixes\Milli::getName
     * @covers \MiBo\Properties\Prefixes\Micro::getName
     * @covers \MiBo\Properties\Prefixes\Nano::getName
     * @covers \MiBo\Properties\Prefixes\Pico::getName
     * @covers \MiBo\Properties\Prefixes\Femto::getName
     * @covers \MiBo\Properties\Prefixes\Atto::getName
     * @covers \MiBo\Properties\Prefixes\Zepto::getName
     * @covers \MiBo\Properties\Prefixes\Yocto::getName
     *
     * @return void
     */
    public function testPrefixName(): void
    {
        $this->assertSame("yottameter", Length::YOTTA()->getUnit()->getName());
        $this->assertSame("zettameter", Length::ZETTA()->getUnit()->getName());
        $this->assertSame("exameter", Length::EXA()->getUnit()->getName());
        $this->assertSame("petameter", Length::PETA()->getUnit()->getName());
        $this->assertSame("terameter", Length::TERA()->getUnit()->getName());
        $this->assertSame("gigameter", Length::GIGA()->getUnit()->getName());
        $this->assertSame("megameter", Length::MEGA()->getUnit()->getName());
        $this->assertSame("kilometer", Length::KILO()->getUnit()->getName());
        $this->assertSame("hectometer", Length::HECTO()->getUnit()->getName());
        $this->assertSame("decameter", Length::DECA()->getUnit()->getName());
        $this->assertSame("decimeter", Length::DECI()->getUnit()->getName());
        $this->assertSame("centimeter", Length::CENTI()->getUnit()->getName());
        $this->assertSame("millimeter", Length::MILLI()->getUnit()->getName());
        $this->assertSame("micrometer", Length::MICRO()->getUnit()->getName());
        $this->assertSame("nanometer", Length::NANO()->getUnit()->getName());
        $this->assertSame("picometer", Length::PICO()->getUnit()->getName());
        $this->assertSame("femtometer", Length::FEMTO()->getUnit()->getName());
        $this->assertSame("attometer", Length::ATTO()->getUnit()->getName());
        $this->assertSame("zeptometer", Length::ZEPTO()->getUnit()->getName());
        $this->assertSame("yoctometer", Length::YOCTO()->getUnit()->getName());
    }

    /**
     * @small
     *
     * @covers \MiBo\Properties\Prefixes\Yotta::getSymbol
     * @covers \MiBo\Properties\Prefixes\Zetta::getSymbol
     * @covers \MiBo\Properties\Prefixes\Exa::getSymbol
     * @covers \MiBo\Properties\Prefixes\Peta::getSymbol
     * @covers \MiBo\Properties\Prefixes\Tera::getSymbol
     * @covers \MiBo\Properties\Prefixes\Giga::getSymbol
     * @covers \MiBo\Properties\Prefixes\Mega::getSymbol
     * @covers \MiBo\Properties\Prefixes\Kilo::getSymbol
     * @covers \MiBo\Properties\Prefixes\Hecto::getSymbol
     * @covers \MiBo\Properties\Prefixes\Deca::getSymbol
     * @covers \MiBo\Properties\Prefixes\Deci::getSymbol
     * @covers \MiBo\Properties\Prefixes\Centi::getSymbol
     * @covers \MiBo\Properties\Prefixes\Milli::getSymbol
     * @covers \MiBo\Properties\Prefixes\Micro::getSymbol
     * @covers \MiBo\Properties\Prefixes\Nano::getSymbol
     * @covers \MiBo\Properties\Prefixes\Pico::getSymbol
     * @covers \MiBo\Properties\Prefixes\Femto::getSymbol
     * @covers \MiBo\Properties\Prefixes\Atto::getSymbol
     * @covers \MiBo\Properties\Prefixes\Zepto::getSymbol
     * @covers \MiBo\Properties\Prefixes\Yocto::getSymbol
     *
     * @return void
     */
    public function testPrefixSymbol(): void
    {
        $this->assertSame("Ym", Length::YOTTA()->getUnit()->getSymbol());
        $this->assertSame("Zm", Length::ZETTA()->getUnit()->getSymbol());
        $this->assertSame("Em", Length::EXA()->getUnit()->getSymbol());
        $this->assertSame("Pm", Length::PETA()->getUnit()->getSymbol());
        $this->assertSame("Tm", Length::TERA()->getUnit()->getSymbol());
        $this->assertSame("Gm", Length::GIGA()->getUnit()->getSymbol());
        $this->assertSame("Mm", Length::MEGA()->getUnit()->getSymbol());
        $this->assertSame("km", Length::KILO()->getUnit()->getSymbol());
        $this->assertSame("hm", Length::HECTO()->getUnit()->getSymbol());
        $this->assertSame("dam", Length::DECA()->getUnit()->getSymbol());
        $this->assertSame("dm", Length::DECI()->getUnit()->getSymbol());
        $this->assertSame("cm", Length::CENTI()->getUnit()->getSymbol());
        $this->assertSame("mm", Length::MILLI()->getUnit()->getSymbol());
        $this->assertSame("μm", Length::MICRO()->getUnit()->getSymbol());
        $this->assertSame("nm", Length::NANO()->getUnit()->getSymbol());
        $this->assertSame("pm", Length::PICO()->getUnit()->getSymbol());
        $this->assertSame("fm", Length::FEMTO()->getUnit()->getSymbol());
        $this->assertSame("am", Length::ATTO()->getUnit()->getSymbol());
        $this->assertSame("zm", Length::ZEPTO()->getUnit()->getSymbol());
        $this->assertSame("ym", Length::YOCTO()->getUnit()->getSymbol());
    }
}
