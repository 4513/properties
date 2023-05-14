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
     * @covers \MiBo\Properties\Prefixes\Yotta::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Zetta::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Exa::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Peta::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Tera::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Giga::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Mega::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Kilo::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Hecto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Deca::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Deci::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Centi::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Milli::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Micro::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Nano::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Pico::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Femto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Atto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Zepto::getMultiplierPrefix
     * @covers \MiBo\Properties\Prefixes\Yocto::getMultiplierPrefix
     *
     * @return void
     */
    public function testPrefixMultiplier(): void
    {
        $this->assertSame(24, Length::YOTTA()->getUnit()->getMultiplier());
        $this->assertSame(21, Length::ZETTA()->getUnit()->getMultiplier());
        $this->assertSame(18, Length::EXA()->getUnit()->getMultiplier());
        $this->assertSame(15, Length::PETA()->getUnit()->getMultiplier());
        $this->assertSame(12, Length::TERA()->getUnit()->getMultiplier());
        $this->assertSame(9, Length::GIGA()->getUnit()->getMultiplier());
        $this->assertSame(6, Length::MEGA()->getUnit()->getMultiplier());
        $this->assertSame(3, Length::KILO()->getUnit()->getMultiplier());
        $this->assertSame(2, Length::HECTO()->getUnit()->getMultiplier());
        $this->assertSame(1, Length::DECA()->getUnit()->getMultiplier());
        $this->assertSame(-1, Length::DECI()->getUnit()->getMultiplier());
        $this->assertSame(-2, Length::CENTI()->getUnit()->getMultiplier());
        $this->assertSame(-3, Length::MILLI()->getUnit()->getMultiplier());
        $this->assertSame(-6, Length::MICRO()->getUnit()->getMultiplier());
        $this->assertSame(-9, Length::NANO()->getUnit()->getMultiplier());
        $this->assertSame(-12, Length::PICO()->getUnit()->getMultiplier());
        $this->assertSame(-15, Length::FEMTO()->getUnit()->getMultiplier());
        $this->assertSame(-18, Length::ATTO()->getUnit()->getMultiplier());
        $this->assertSame(-21, Length::ZEPTO()->getUnit()->getMultiplier());
        $this->assertSame(-24, Length::YOCTO()->getUnit()->getMultiplier());
    }

    /**
     * @small
     *
     * @covers \MiBo\Properties\Prefixes\Yotta::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Zetta::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Exa::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Peta::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Tera::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Giga::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Mega::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Kilo::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Hecto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Deca::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Deci::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Centi::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Milli::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Micro::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Nano::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Pico::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Femto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Atto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Zepto::getNamePrefix
     * @covers \MiBo\Properties\Prefixes\Yocto::getNamePrefix
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
     * @covers \MiBo\Properties\Prefixes\Yotta::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Zetta::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Exa::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Peta::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Tera::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Giga::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Mega::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Kilo::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Hecto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Deca::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Deci::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Centi::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Milli::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Micro::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Nano::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Pico::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Femto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Atto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Zepto::getSymbolPrefix
     * @covers \MiBo\Properties\Prefixes\Yocto::getSymbolPrefix
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
