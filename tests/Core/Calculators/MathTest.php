<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Calculators;

use MiBo\Properties\Calculators\Math;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;
use ValueError;

/**
 * Class MathTest
 *
 * @package MiBo\Properties\Tests\Calculators
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(Math::class)]
#[Small]
class MathTest extends TestCase
{
    public function testAbs(): void
    {
        self::assertSame(1, Math::abs(-1));
        self::assertSame(1, Math::abs(1));
        self::assertSame(1.1, Math::abs(-1.1));
        self::assertSame(1.1, Math::abs(1.1));

        $randomNumbers = [-9, -5.5, -3, 0, 10, 11.1, 10000054];

        foreach ($randomNumbers as $number) {
            self::assertSame(abs($number), Math::absolute($number));
        }
    }

    public function testAcos(): void
    {
        self::assertSame(0.0, Math::acos(1));
        self::assertSame(0.0, Math::acos(1.0));
        self::assertSame(Math::PI, Math::acos(-1));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(acos($number), Math::arcCosine($number));
        }
    }

    public function testAcosh(): void
    {
        self::assertSame(0.0, Math::acosh(1));
        self::assertSame(0.0, Math::acosh(1.0));
        self::assertNan(Math::acosh(-1));

        $randomNumbers = [1, 2, 3.3];

        foreach ($randomNumbers as $number) {
            self::assertSame(acosh($number), Math::inverseHyperbolicCosine($number));
        }
    }

    public function testAsin(): void
    {
        self::assertSame(0.0, Math::asin(0));
        self::assertSame(0.0, Math::asin(0.0));
        self::assertSame(Math::PI / 2, Math::asin(1));
        self::assertSame(Math::PI / 2, Math::asin(1.0));
        self::assertSame(-Math::PI / 2, Math::asin(-1));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(asin($number), Math::arcSine($number));
        }
    }

    public function testAsinh(): void
    {
        self::assertSame(0.0, Math::asinh(0));
        self::assertSame(0.0, Math::asinh(0.0));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(asinh($number), Math::inverseHyperbolicSine($number));
        }
    }

    public function testAtan2(): void
    {
        self::assertSame(0.0, Math::atan2(0, 1));
        self::assertSame(0.0, Math::atan2(0.0, 1.0));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(atan2($number, $number), Math::atan2($number, $number));
        }
    }

    public function testAtan(): void
    {
        self::assertSame(0.0, Math::atan(0));
        self::assertSame(0.0, Math::atan(0.0));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(atan($number), Math::arcTangent($number));
        }
    }

    public function testAtanh(): void
    {
        self::assertSame(0.0, Math::atanh(0));
        self::assertSame(0.0, Math::atanh(0.0));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(atanh($number), Math::inverseHyperbolicTangent($number));
        }
    }

    public function testConvertBase(): void
    {
        self::assertSame("101000110111001100110100", Math::convertBase('a37334', 16, 2));
        self::assertSame("101000110111001100110100", Math::base_convert('a37334', 16, 2));
        self::assertSame(base_convert('a37334', 16, 2), Math::convertBase('a37334', 16, 2));
    }

    public function testBindec(): void
    {
        self::assertSame(51, Math::bindec('110011'));
        self::assertSame(51, Math::binaryToDecimal('000110011'));
        self::assertSame(bindec('110011'), Math::bindec('110011'));
    }

    public function testCeil(): void
    {
        foreach ([1, 0, 1.1, 3.0000001, 999.5, 11,9] as $number) {
            self::assertSame(ceil($number), Math::ceil($number));
        }
    }

    public function testCos(): void
    {
        self::assertSame(1.0, Math::cos(0));
        self::assertSame(1.0, Math::cos(0.0));
        self::assertSame(0.5403023058681398, Math::cos(1));
        self::assertSame(0.5403023058681398, Math::cos(1.0));
        self::assertSame(0.5403023058681398, Math::cos(-1));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(cos($number), Math::cosine($number));
        }
    }

    public function testCosh(): void
    {
        self::assertSame(1.0, Math::cosh(0));
        self::assertSame(1.0, Math::cosh(0.0));
        self::assertSame(1.5430806348152437, Math::cosh(1));
        self::assertSame(1.5430806348152437, Math::cosh(1.0));
        self::assertSame(1.5430806348152437, Math::cosh(-1));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(cosh($number), Math::hyperbolicCosine($number));
        }
    }

    public function testDecbin(): void
    {
        self::assertSame('110011', Math::decbin(51));
        self::assertSame('110011', Math::decimalToBinary(51));
        self::assertSame(decbin(51), Math::decbin(51));
    }

    public function testDecHex(): void
    {
        self::assertSame('a44f4', Math::dechex(673012));
        self::assertSame('a44f4', Math::decimalToHexadecimal(673012));
        self::assertSame(dechex(673012), Math::dechex(673012));
    }

    public function testDecOct(): void
    {
        self::assertSame('1234567', Math::decoct(342391));
        self::assertSame('1234567', Math::decimalToOctal(342391));
        self::assertSame(decoct(342391), Math::decoct(342391));
    }

    public function testDeg2Rad(): void
    {
        self::assertSame(0.0, Math::deg2rad(0));
        self::assertSame(0.0, Math::deg2rad(0.0));
        self::assertSame(0.017453292519943295, Math::deg2rad(1));
        self::assertSame(0.017453292519943295, Math::deg2rad(1.0));
        self::assertSame(-0.017453292519943295, Math::deg2rad(-1));
        self::assertSame(deg2rad(1), Math::degreesToRadian(1));
    }

    public function testExp(): void
    {
        self::assertSame(1.0, Math::exp(0));
        self::assertSame(1.0, Math::exp(0.0));
        self::assertSame(2.718281828459045, Math::exp(1));
        self::assertSame(2.718281828459045, Math::exp(1.0));
        self::assertSame(0.36787944117144233, Math::exp(-1));
        self::assertSame(exp(1), Math::exp(1));
    }

    public function testExpm1(): void
    {
        self::assertSame(0.0, Math::expm1(0));
        self::assertSame(0.0, Math::expm1(0.0));
        self::assertSame(1.718281828459045, Math::expm1(1));
        self::assertSame(1.718281828459045, Math::expm1(1.0));
        self::assertSame(-0.6321205588285577, Math::expm1(-1));
        self::assertSame(expm1(1), Math::expm1(1));
    }

    public function testFdiv(): void
    {
        self::assertSame(4.384615384615385, Math::fdiv(5.7, 1.3));
        self::assertSame(2.0, Math::fdiv(4, 2));
        self::assertInfinite(Math::fdiv(1.0, 0.0));
        self::assertNan(Math::fdiv(0.0, 0.0));
    }

    public function testFloor(): void
    {
        foreach ([1, 0, 1.1, 3.0000001, 999.5, 11,9] as $number) {
            self::assertSame(floor($number), Math::floor($number));
        }
    }

    public function testFmod(): void
    {
        self::assertSame(0.5, Math::fmod(5.7, 1.3));
        self::assertSame(0.0, Math::fmod(4, 2));
        self::assertNan(Math::fmod(1.0, 0.0));
        self::assertNan(Math::fmod(0.0, 0.0));
    }

    public function testGetRandMax(): void
    {
        self::assertIsInt(Math::getrandmax());
    }

    public function testHexDec(): void
    {
        self::assertSame(673012, Math::hexdec('a44f4'));
        self::assertSame(673012, Math::hexadecimalToDecimal('a44f4'));
        self::assertSame(hexdec('a44f4'), Math::hexdec('a44f4'));
    }

    public function testHypot(): void
    {
        self::assertSame(5.0, Math::hypot(3, 4));
        self::assertSame(7.211102550927978, Math::hypot(4, 6));
        self::assertSame(3.1622776601683795, Math::hypot(1, 3));
    }

    public function testIntDiv(): void
    {
        self::assertSame(5.0, Math::intdiv(5, 1));
        self::assertSame(2.0, Math::intdiv(4, 2));
    }

    public function testIsFinite(): void
    {
        self::assertTrue(Math::isFinite(1));
        self::assertTrue(Math::isFinite(1.0));
        self::assertTrue(Math::isFinite(1.1));
        self::assertTrue(Math::isFinite(1.1e10));
        self::assertFalse(Math::is_finite(Math::INF));
    }

    public function testIsInfinite(): void
    {
        self::assertTrue(Math::is_infinite(Math::INF));
        self::assertFalse(Math::isInfinite(1));
        self::assertFalse(Math::isInfinite(1.0));
        self::assertFalse(Math::isInfinite(1.1));
        self::assertFalse(Math::isInfinite(1.1e10));
    }

    public function testIsNaN(): void
    {
        self::assertTrue(Math::is_nan(Math::NAN));
        self::assertFalse(Math::isNaN(1));
        self::assertFalse(Math::isNaN(1.0));
        self::assertFalse(Math::isNaN(1.1));
        self::assertFalse(Math::isNaN(1.1e10));
    }

    public function testLcgValue(): void
    {
        self::assertIsFloat(Math::lcg_value());
    }

    public function testLog10(): void
    {
        foreach ([2.7183, 2, 1] as $number) {
            self::assertSame(log10($number), Math::log10($number));
        }
    }

    public function testLog1p(): void
    {
        foreach ([2.7183, 2, 1] as $number) {
            self::assertSame(log1p($number), Math::log1p($number));
        }
    }

    public function testLog(): void
    {
        foreach ([2.7183, 2, 1] as $number) {
            self::assertSame(log($number), Math::log($number));
        }
    }

    public function testMax(): void
    {
        self::assertSame(5, Math::max(1, 2, 3, 4, 5));
        self::assertSame(5.5, Math::max(1.1, 2.2, 3.3, 4.4, 5.5));
    }

    public function testMin(): void
    {
        self::assertSame(1, Math::min(1, 2, 3, 4, 5));
        self::assertSame(1.1, Math::min(1.1, 2.2, 3.3, 4.4, 5.5));
    }

    public function testMtGetRandMax(): void
    {
        self::assertIsInt(Math::mt_getrandmax());
    }

    public function testMtRand(): void
    {
        self::assertIsInt(Math::mt_rand());
        self::assertIsInt(Math::mt_rand(1, 5));
        self::assertIsInt(Math::mt_rand(1, 2));

        $this->expectException(ValueError::class);

        Math::randMT(5, 0);
    }

    public function testMtSRand(): void
    {
        self::expectNotToPerformAssertions();

        Math::mt_srand();
    }

    public function testOctalToDecimal(): void
    {
        self::assertSame(octdec('77'), Math::octdec('77'));
    }

    public function testPI(): void
    {
        self::assertSame(Math::PI, Math::pi());
    }

    public function testPow(): void
    {
        self::assertSame(8, Math::pow(2, 3));
        self::assertSame(1, Math::pow(2, 0));
        self::assertSame(0.25, Math::pow(2, -2));
    }

    public function testRad2Deg(): void
    {
        self::assertSame(180.0, Math::rad2deg(Math::PI));
    }

    public function testRand(): void
    {
        self::assertIsInt(Math::rand());
        self::assertIsInt(Math::rand(1, 5));
        self::assertIsInt(Math::rand(1, 2));

        $this->expectException(ValueError::class);

        Math::rand(5, 0);
    }

    public function testRound(): void
    {
        $numbers    = [0, 0.5, 0.2, 0.3, 0.9, 0.000001, 10, 0.15, 0.99, 11.00001, 100, 55, 52];
        $precisions = [0, 1, 2, 3, 4, 5, 6, 7, 8, -1, -2];
        $modes      = [PHP_ROUND_HALF_DOWN, PHP_ROUND_HALF_EVEN, PHP_ROUND_HALF_ODD, PHP_ROUND_HALF_UP];

        foreach ($numbers as $number) {
            foreach ($precisions as $precision) {
                foreach ($modes as $mode) {
                    self::assertSame(
                        round($number, $precision, $mode),
                        Math::round($number, $precision, $mode)
                    );
                }
            }
        }
    }

    public function testSin(): void
    {
        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(sin($number), Math::sin($number));
        }
    }

    public function testSinh(): void
    {
        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(sinh($number), Math::sinh($number));
        }
    }

    public function testSqrt(): void
    {
        $randomNumbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

        foreach ($randomNumbers as $number) {
            self::assertSame(sqrt($number), Math::sqrt($number));
        }
    }
    public function testSrand(): void
    {
        self::expectNotToPerformAssertions();

        Math::srand();
    }

    public function testTan(): void
    {
        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(tan($number), Math::tan($number));
        }
    }

    public function testTanh(): void
    {
        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            self::assertSame(tanh($number), Math::tanh($number));
        }
    }

    public function testNegate(): void
    {
        self::assertSame(-1, Math::negate(1));
        self::assertSame(1, Math::negate(-1));
        self::assertSame(0, Math::negate(0));
    }

    public function testSum(): void
    {
        self::assertSame(0, Math::sum());
        self::assertSame(1+2+3+4+5+6+7+8+9+10, Math::sum(1,2,3,4,5,6,7,8,9,10));
    }

    public function testDiff(): void
    {
        self::assertSame(0, Math::diff(0));
        self::assertSame(1-2-3-4-5-6-7-8-9-10, Math::diff(1,2,3,4,5,6,7,8,9,10));
    }

    public function testProduct(): void
    {
        self::assertSame(100, Math::product(10, 10));
        self::assertSame(1*2*3*4*5*6*7*8*9*10, Math::product(1,2,3,4,5,6,7,8,9,10));
    }

    public function testRatio(): void
    {
        self::assertSame(1, Math::ratio(10, 10));
        self::assertSame(1/2/3/4/5/6/7/8/9/10, Math::ratio(1,2,3,4,5,6,7,8,9,10));
    }
}
