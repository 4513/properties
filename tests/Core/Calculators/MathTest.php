<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Calculators;

use MiBo\Properties\Calculators\Math;
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
 *
 * @coversDefaultClass \MiBo\Properties\Calculators\Math
 */
class MathTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::abs
     * @covers ::absolute
     *
     * @return void
     */
    public function testAbs(): void
    {
        $this->assertSame(1, Math::abs(-1));
        $this->assertSame(1, Math::abs(1));
        $this->assertSame(1.1, Math::abs(-1.1));
        $this->assertSame(1.1, Math::abs(1.1));

        $randomNumbers = [-9, -5.5, -3, 0, 10, 11.1, 10000054];

        foreach ($randomNumbers as $number) {
            $this->assertSame(abs($number), Math::absolute($number));
        }
    }

    /**
     * @small
     *
     * @covers ::acos
     * @covers ::arcCosine
     *
     * @return void
     */
    public function testAcos(): void
    {
        $this->assertSame(0.0, Math::acos(1));
        $this->assertSame(0.0, Math::acos(1.0));
        $this->assertSame(Math::PI, Math::acos(-1));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(acos($number), Math::arcCosine($number));
        }
    }

    /**
     * @small
     *
     * @covers ::acosh
     * @covers ::inverseHyperbolicCosine
     *
     * @return void
     */
    public function testAcosh(): void
    {
        $this->assertSame(0.0, Math::acosh(1));
        $this->assertSame(0.0, Math::acosh(1.0));
        $this->assertNan(Math::acosh(-1));

        $randomNumbers = [1, 2, 3.3];

        foreach ($randomNumbers as $number) {
            $this->assertSame(acosh($number), Math::inverseHyperbolicCosine($number));
        }
    }

    /**
     * @small
     *
     * @covers ::asin
     * @covers ::arcSine
     *
     * @return void
     */
    public function testAsin(): void
    {
        $this->assertSame(0.0, Math::asin(0));
        $this->assertSame(0.0, Math::asin(0.0));
        $this->assertSame(Math::PI / 2, Math::asin(1));
        $this->assertSame(Math::PI / 2, Math::asin(1.0));
        $this->assertSame(-Math::PI / 2, Math::asin(-1));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(asin($number), Math::arcSine($number));
        }
    }

    /**
     * @small
     *
     * @covers ::asinh
     * @covers ::inverseHyperbolicSine
     *
     * @return void
     */
    public function testAsinh(): void
    {
        $this->assertSame(0.0, Math::asinh(0));
        $this->assertSame(0.0, Math::asinh(0.0));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(asinh($number), Math::inverseHyperbolicSine($number));
        }
    }

    /**
     * @small
     *
     * @covers ::atan2
     *
     * @return void
     */
    public function testAtan2(): void
    {
        $this->assertSame(0.0, Math::atan2(0, 1));
        $this->assertSame(0.0, Math::atan2(0.0, 1.0));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(atan2($number, $number), Math::atan2($number, $number));
        }
    }

    /**
     * @small
     *
     * @covers ::atan
     * @covers ::arcTangent
     *
     * @return void
     */
    public function testAtan(): void
    {
        $this->assertSame(0.0, Math::atan(0));
        $this->assertSame(0.0, Math::atan(0.0));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(atan($number), Math::arcTangent($number));
        }
    }

    /**
     * @small
     *
     * @covers ::atanh
     * @covers ::inverseHyperbolicTangent
     *
     * @return void
     */
    public function testAtanh(): void
    {
        $this->assertSame(0.0, Math::atanh(0));
        $this->assertSame(0.0, Math::atanh(0.0));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(atanh($number), Math::inverseHyperbolicTangent($number));
        }
    }

    /**
     * @small
     *
     * @covers ::base_convert
     * @covers ::convertBase
     *
     * @return void
     */
    public function testConvertBase(): void
    {
        $this->assertSame("101000110111001100110100", Math::convertBase('a37334', 16, 2));
        $this->assertSame("101000110111001100110100", Math::base_convert('a37334', 16, 2));
        $this->assertSame(base_convert('a37334', 16, 2), Math::convertBase('a37334', 16, 2));
    }

    /**
     * @small
     *
     * @covers ::bindec
     * @covers ::binaryToDecimal
     *
     * @return void
     */
    public function testBindec(): void
    {
        $this->assertSame(51, Math::bindec('110011'));
        $this->assertSame(51, Math::binaryToDecimal('000110011'));
        $this->assertSame(bindec('110011'), Math::bindec('110011'));
    }

    /**
     * @small
     *
     * @covers ::ceil
     *
     * @return void
     */
    public function testCeil(): void
    {
        foreach ([1, 0, 1.1, 3.0000001, 999.5, 11,9] as $number) {
            $this->assertSame(ceil($number), Math::ceil($number));
        }
    }

    /**
     * @small
     *
     * @covers ::cos
     * @covers ::cosine
     *
     * @return void
     */
    public function testCos(): void
    {
        $this->assertSame(1.0, Math::cos(0));
        $this->assertSame(1.0, Math::cos(0.0));
        $this->assertSame(0.5403023058681398, Math::cos(1));
        $this->assertSame(0.5403023058681398, Math::cos(1.0));
        $this->assertSame(0.5403023058681398, Math::cos(-1));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(cos($number), Math::cosine($number));
        }
    }

    /**
     * @small
     *
     * @covers ::cosh
     * @covers ::hyperbolicCosine
     *
     * @return void
     */
    public function testCosh(): void
    {
        $this->assertSame(1.0, Math::cosh(0));
        $this->assertSame(1.0, Math::cosh(0.0));
        $this->assertSame(1.5430806348152437, Math::cosh(1));
        $this->assertSame(1.5430806348152437, Math::cosh(1.0));
        $this->assertSame(1.5430806348152437, Math::cosh(-1));

        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(cosh($number), Math::hyperbolicCosine($number));
        }
    }

    /**
     * @small
     *
     * @covers ::decbin
     * @covers ::decimalToBinary
     *
     * @return void
     */
    public function testDecbin(): void
    {
        $this->assertSame('110011', Math::decbin(51));
        $this->assertSame('110011', Math::decimalToBinary(51));
        $this->assertSame(decbin(51), Math::decbin(51));
    }

    /**
     * @small
     *
     * @covers ::dechex
     * @covers ::decimalToHexadecimal
     *
     * @return void
     */
    public function testDecHex(): void
    {
        $this->assertSame('a44f4', Math::dechex(673012));
        $this->assertSame('a44f4', Math::decimalToHexadecimal(673012));
        $this->assertSame(dechex(673012), Math::dechex(673012));
    }

    /**
     * @small
     *
     * @covers ::decoct
     * @covers ::decimalToOctal
     *
     * @return void
     */
    public function testDecOct(): void
    {
        $this->assertSame('1234567', Math::decoct(342391));
        $this->assertSame('1234567', Math::decimalToOctal(342391));
        $this->assertSame(decoct(342391), Math::decoct(342391));
    }

    /**
     * @small
     *
     * @covers ::deg2rad
     * @covers ::degreesToRadian
     *
     * @return void
     */
    public function testDeg2Rad(): void
    {
        $this->assertSame(0.0, Math::deg2rad(0));
        $this->assertSame(0.0, Math::deg2rad(0.0));
        $this->assertSame(0.017453292519943295, Math::deg2rad(1));
        $this->assertSame(0.017453292519943295, Math::deg2rad(1.0));
        $this->assertSame(-0.017453292519943295, Math::deg2rad(-1));
        $this->assertSame(deg2rad(1), Math::degreesToRadian(1));
    }

    /**
     * @small
     *
     * @covers ::exp
     * @covers ::exponent
     *
     * @return void
     */
    public function testExp(): void
    {
        $this->assertSame(1.0, Math::exp(0));
        $this->assertSame(1.0, Math::exp(0.0));
        $this->assertSame(2.718281828459045, Math::exp(1));
        $this->assertSame(2.718281828459045, Math::exp(1.0));
        $this->assertSame(0.36787944117144233, Math::exp(-1));
        $this->assertSame(exp(1), Math::exp(1));
    }

    /**
     * @small
     *
     * @covers ::expm1
     *
     * @return void
     */
    public function testExpm1(): void
    {
        $this->assertSame(0.0, Math::expm1(0));
        $this->assertSame(0.0, Math::expm1(0.0));
        $this->assertSame(1.718281828459045, Math::expm1(1));
        $this->assertSame(1.718281828459045, Math::expm1(1.0));
        $this->assertSame(-0.6321205588285577, Math::expm1(-1));
        $this->assertSame(expm1(1), Math::expm1(1));
    }

    /**
     * @small
     *
     * @covers ::fdiv
     *
     * @return void
     */
    public function testFdiv(): void
    {
        $this->assertSame(4.384615384615385, Math::fdiv(5.7, 1.3));
        $this->assertSame(2.0, Math::fdiv(4, 2));
        $this->assertInfinite(Math::fdiv(1.0, 0.0));
        $this->assertNan(Math::fdiv(0.0, 0.0));
    }

    /**
     * @small
     *
     * @covers ::floor
     *
     * @return void
     */
    public function testFloor(): void
    {
        foreach ([1, 0, 1.1, 3.0000001, 999.5, 11,9] as $number) {
            $this->assertSame(floor($number), Math::floor($number));
        }
    }

    /**
     * @small
     *
     * @covers ::fmod
     *
     * @return void
     */
    public function testFmod(): void
    {
        $this->assertSame(0.5, Math::fmod(5.7, 1.3));
        $this->assertSame(0.0, Math::fmod(4, 2));
        $this->assertNan(Math::fmod(1.0, 0.0));
        $this->assertNan(Math::fmod(0.0, 0.0));
    }

    /**
     * @small
     *
     * @covers ::getrandmax
     * @covers ::getLargestRandomValue
     *
     * @return void
     */
    public function testGetRandMax(): void
    {
        $this->assertIsInt(Math::getrandmax());
    }

    /**
     * @small
     *
     * @covers ::hexdec
     * @covers ::hexadecimalToDecimal
     *
     * @return void
     */
    public function testHexDec(): void
    {
        $this->assertSame(673012, Math::hexdec('a44f4'));
        $this->assertSame(673012, Math::hexadecimalToDecimal('a44f4'));
        $this->assertSame(hexdec('a44f4'), Math::hexdec('a44f4'));
    }

    /**
     * @small
     *
     * @covers ::hypot
     *
     * @return void
     */
    public function testHypot(): void
    {
        $this->assertSame(5.0, Math::hypot(3, 4));
        $this->assertSame(7.211102550927978, Math::hypot(4, 6));
        $this->assertSame(3.1622776601683795, Math::hypot(1, 3));
    }

    /**
     * @small
     *
     * @covers ::intdiv
     *
     * @return void
     */
    public function testIntDiv(): void
    {
        $this->assertSame(5.0, Math::intdiv(5, 1));
        $this->assertSame(2.0, Math::intdiv(4, 2));
    }

    /**
     * @small
     *
     * @covers ::is_finite
     * @covers ::isFinite
     *
     * @return void
     */
    public function testIsFinite(): void
    {
        $this->assertTrue(Math::isFinite(1));
        $this->assertTrue(Math::isFinite(1.0));
        $this->assertTrue(Math::isFinite(1.1));
        $this->assertTrue(Math::isFinite(1.1e10));
        $this->assertFalse(Math::is_finite(Math::INF));
    }

    /**
     * @small
     *
     * @covers ::is_infinite
     * @covers ::isInfinite
     *
     * @return void
     */
    public function testIsInfinite(): void
    {
        $this->assertTrue(Math::is_infinite(Math::INF));
        $this->assertFalse(Math::isInfinite(1));
        $this->assertFalse(Math::isInfinite(1.0));
        $this->assertFalse(Math::isInfinite(1.1));
        $this->assertFalse(Math::isInfinite(1.1e10));
    }

    /**
     * @small
     *
     * @covers ::is_nan
     * @covers ::isNaN
     *
     * @return void
     */
    public function testIsNaN(): void
    {
        $this->assertTrue(Math::is_nan(Math::NAN));
        $this->assertFalse(Math::isNaN(1));
        $this->assertFalse(Math::isNaN(1.0));
        $this->assertFalse(Math::isNaN(1.1));
        $this->assertFalse(Math::isNaN(1.1e10));
    }

    /**
     * @small
     *
     * @covers ::lcg_value
     * @covers ::randomLCG
     *
     * @return void
     */
    public function testLcgValue(): void
    {
        $this->assertIsFloat(Math::lcg_value());
    }

    /**
     * @small
     *
     * @covers ::log10
     *
     * @return void
     */
    public function testLog10(): void
    {
        foreach ([2.7183, 2, 1] as $number) {
            $this->assertSame(log10($number), Math::log10($number));
        }
    }

    /**
     * @small
     *
     * @covers ::log1p
     *
     * @return void
     */
    public function testLog1p(): void
    {
        foreach ([2.7183, 2, 1] as $number) {
            $this->assertSame(log1p($number), Math::log1p($number));
        }
    }

    /**
     * @small
     *
     * @covers ::log
     *
     * @return void
     */
    public function testLog(): void
    {
        foreach ([2.7183, 2, 1] as $number) {
            $this->assertSame(log($number), Math::log($number));
        }
    }

    /**
     * @small
     *
     * @covers ::max
     *
     * @return void
     */
    public function testMax(): void
    {
        $this->assertSame(5, Math::max(1, 2, 3, 4, 5));
        $this->assertSame(5.5, Math::max(1.1, 2.2, 3.3, 4.4, 5.5));
    }

    /**
     * @small
     *
     * @covers ::min
     *
     * @return void
     */
    public function testMin(): void
    {
        $this->assertSame(1, Math::min(1, 2, 3, 4, 5));
        $this->assertSame(1.1, Math::min(1.1, 2.2, 3.3, 4.4, 5.5));
    }

    /**
     * @small
     *
     * @covers ::mt_getrandmax
     * @covers ::getLargestRandomValueMT
     *
     * @return void
     */
    public function testMtGetRandMax(): void
    {
        $this->assertIsInt(Math::mt_getrandmax());
    }

    /**
     * @small
     *
     * @covers ::mt_rand
     * @covers ::randMT
     *
     * @return void
     */
    public function testMtRand(): void
    {
        $this->assertIsInt(Math::mt_rand());
        $this->assertIsInt(Math::mt_rand(1, 5));
        $this->assertIsInt(Math::mt_rand(1, 2));

        $this->expectException(ValueError::class);

        Math::randMT(5, 0);
    }

    /**
     * @small
     *
     * @covers ::mt_srand
     * @covers ::srandMT
     *
     * @doesNotPerformAssertions
     *
     * @return void
     */
    public function testMtSRand(): void
    {
        Math::mt_srand();
    }

    /**
     * @small
     *
     * @covers ::octdec
     * @covers ::octalToDecimal
     *
     * @return void
     */
    public function testOctalToDecimal(): void
    {
        $this->assertSame(octdec('77'), Math::octdec('77'));
    }

    /**
     * @small
     *
     * @covers ::pi
     *
     * @return void
     */
    public function testPI(): void
    {
        $this->assertSame(Math::PI, Math::pi());
    }

    /**
     * @small
     *
     * @covers ::pow
     *
     * @return void
     */
    public function testPow(): void
    {
        $this->assertSame(8, Math::pow(2, 3));
        $this->assertSame(1, Math::pow(2, 0));
        $this->assertSame(0.25, Math::pow(2, -2));
    }

    /**
     * @small
     *
     * @covers ::rad2deg
     * @covers ::radianToDegrees
     *
     * @return void
     */
    public function testRad2Deg(): void
    {
        $this->assertSame(180.0, Math::rad2deg(Math::PI));
    }

    /**
     * @small
     *
     * @covers ::rand
     *
     * @return void
     */
    public function testRand(): void
    {
        $this->assertIsInt(Math::rand());
        $this->assertIsInt(Math::rand(1, 5));
        $this->assertIsInt(Math::rand(1, 2));

        $this->expectException(ValueError::class);

        Math::rand(5, 0);
    }

    /**
     * @small
     *
     * @covers ::round
     *
     * @return void
     */
    public function testRound(): void
    {
        $numbers    = [0, 0.5, 0.2, 0.3, 0.9, 0.000001, 10, 0.15, 0.99, 11.00001, 100, 55, 52];
        $precisions = [0, 1, 2, 3, 4, 5, 6, 7, 8, -1, -2];
        $modes      = [PHP_ROUND_HALF_DOWN, PHP_ROUND_HALF_EVEN, PHP_ROUND_HALF_ODD, PHP_ROUND_HALF_UP];

        foreach ($numbers as $number) {
            foreach ($precisions as $precision) {
                foreach ($modes as $mode) {
                    $this->assertSame(
                        round($number, $precision, $mode),
                        Math::round($number, $precision, $mode)
                    );
                }
            }
        }
    }

    /**
     * @small
     *
     * @covers ::sin
     * @covers ::sine
     *
     * @return void
     */
    public function testSin(): void
    {
        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(sin($number), Math::sin($number));
        }
    }

    /**
     * @small
     *
     * @covers ::sinh
     * @covers ::hyperbolicSine
     *
     * @return void
     */
    public function testSinh(): void
    {
        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(sinh($number), Math::sinh($number));
        }
    }

    /**
     * @small
     *
     * @covers ::sqrt
     *
     * @return void
     */
    public function testSqrt(): void
    {
        $randomNumbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

        foreach ($randomNumbers as $number) {
            $this->assertSame(sqrt($number), Math::sqrt($number));
        }
    }

    /**
     * @small
     *
     * @covers ::srand
     *
     * @doesNotPerformAssertions
     *
     * @return void
     */
    public function testSrand(): void
    {
        Math::srand();
    }

    /**
     * @small
     *
     * @covers ::tan
     * @covers ::tangent
     *
     * @return void
     */
    public function testTan(): void
    {
        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(tan($number), Math::tan($number));
        }
    }

    /**
     * @small
     *
     * @covers ::tanh
     * @covers ::hyperbolicTangent
     *
     * @return void
     */
    public function testTanh(): void
    {
        $randomNumbers = [-1, -0.5, 0, 0.5, 1];

        foreach ($randomNumbers as $number) {
            $this->assertSame(tanh($number), Math::tanh($number));
        }
    }

    /**
     * @small
     *
     * @covers ::negate
     *
     * @return void
     */
    public function testNegate(): void
    {
        $this->assertSame(-1, Math::negate(1));
        $this->assertSame(1, Math::negate(-1));
        $this->assertSame(0, Math::negate(0));
    }

    /**
     * @small
     *
     * @covers ::sum
     *
     * @return void
     */
    public function testSum(): void
    {
        $this->assertSame(0, Math::sum());
        $this->assertSame(1+2+3+4+5+6+7+8+9+10, Math::sum(1,2,3,4,5,6,7,8,9,10));
    }

    /**
     * @small
     *
     * @covers ::diff
     *
     * @return void
     */
    public function testDiff(): void
    {
        $this->assertSame(0, Math::diff(0));
        $this->assertSame(1-2-3-4-5-6-7-8-9-10, Math::diff(1,2,3,4,5,6,7,8,9,10));
    }

    /**
     * @small
     *
     * @covers ::product
     *
     * @return void
     */
    public function testProduct(): void
    {
        $this->assertSame(100, Math::product(10, 10));
        $this->assertSame(1*2*3*4*5*6*7*8*9*10, Math::product(1,2,3,4,5,6,7,8,9,10));
    }

    /**
     * @small
     *
     * @covers ::ratio
     *
     * @return void
     */
    public function testRatio(): void
    {
        $this->assertSame(1, Math::ratio(10, 10));
        $this->assertSame(1/2/3/4/5/6/7/8/9/10, Math::ratio(1,2,3,4,5,6,7,8,9,10));
    }
}
