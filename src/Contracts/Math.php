<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

use CompileError;
use JetBrains\PhpStorm\Pure;
use ValueError;
use const M_E;
use const M_PI;
use const INF;
use const NAN;

/**
 * Class Math
 *
 * @package MiBo\Properties\Contracts
 *
 * @link https://www.php.net/manual/en/ref.math.php
 */
class Math
{
    /**
     * <i>e</i> constant
     */
    public const E = M_E;

    /**
     * &pi; constant
     */
    public const PI = M_PI;

    /**
     * The infinite
     */
    public const INF = INF;

    /**
     * Not a Number
     */
    public const NaN = NAN;

    /**
     * Returns the absolute value of number.
     *
     * @param int|float $number The numeric value to process.
     *
     * @return int|float The absolute value of number. If the argument num is of type float, the return type
     * is also float, otherwise it is int (as float usually has a bigger value range than int).
     *
     * @link https://www.php.net/manual/en/function.abs.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function abs(int|float $number): int|float
    {
        return self::absolute($number);
    }

    /**
     * Returns the absolute value of number.
     *
     * @param int|float $number The numeric value to process.
     *
     * @return int|float The absolute value of number. If the argument num is of type float, the return type
     * is also float, otherwise it is int (as float usually has a bigger value range than int).
     *
     * @link https://www.php.net/manual/en/function.abs.php
     */
    public static function absolute(int|float $number): int|float
    {
        return abs($number);
    }

    /**
     *  Returns the arc cosine of num in radians. acos() is the inverse function of cos(), which means that
     * a==cos(acos(a)) for every value of a that is within acos()' range.
     *
     * @param float $number The argument to process.
     *
     * @return float The arc cosine of number in radians.
     *
     * @link https://www.php.net/manual/en/function.acos.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function acos(float $number): float
    {
        return self::arcCosine($number);
    }

    /**
     *  Returns the arc cosine of num in radians. acos() is the inverse function of cos(), which means that
     * a==cos(acos(a)) for every value of a that is within acos()' range.
     *
     * @param float $number The argument to process.
     *
     * @return float The arc cosine of number in radians.
     *
     * @link https://www.php.net/manual/en/function.acos.php
     */
    public static function arcCosine(float $number): float
    {
        return acos($number);
    }

    /**
     * Returns the inverse hyperbolic cosine of number, i.e. the value whose hyperbolic cosine is number.
     *
     * @param float $number The value to process
     *
     * @return float The inverse hyperbolic cosine of number.
     *
     * @link https://www.php.net/manual/en/function.acosh.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function acosh(float $number): float
    {
        return self::inverseHyperbolicCosine($number);
    }

    /**
     * Returns the inverse hyperbolic cosine of number, i.e. the value whose hyperbolic cosine is number.
     *
     * @param float $number The value to process
     *
     * @return float The inverse hyperbolic cosine of number.
     *
     * @link https://www.php.net/manual/en/function.acosh.php
     */
    public static function inverseHyperbolicCosine(float $number): float
    {
        return acosh($number);
    }

    /**
     *  Returns the arc sine of number in radians. asin() is the inverse function of sin(), which means that
     * a==sin(asin(a)) for every value of a that is within asin()'s range.
     *
     * @param float $number The argument to process.
     *
     * @return float The arc sine of number in radians.
     *
     * @link https://www.php.net/manual/en/function.asin.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function asin(float $number): float
    {
        return self::arcSine($number);
    }

    /**
     *  Returns the arc sine of number in radians. asin() is the inverse function of sin(), which means that
     * a==sin(asin(a)) for every value of a that is within asin()'s range.
     *
     * @param float $number The argument to process.
     *
     * @return float The arc sine of number in radians.
     *
     * @link https://www.php.net/manual/en/function.asin.php
     */
    public static function arcSine(float $number): float
    {
        return asin($number);
    }

    /**
     * Returns the inverse hyperbolic sine of number, i.e. the value whose hyperbolic sine is number.
     *
     * @param float $number The argument to process.
     *
     * @return float The inverse hyperbolic sine of number.
     *
     * @link https://www.php.net/manual/en/function.asinh.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function asinh(float $number): float
    {
        return self::inverseHyperbolicSine($number);
    }

    /**
     * Returns the inverse hyperbolic sine of number, i.e. the value whose hyperbolic sine is number.
     *
     * @param float $number The argument to process.
     *
     * @return float The inverse hyperbolic sine of number.
     *
     * @link https://www.php.net/manual/en/function.asinh.php
     */
    public static function inverseHyperbolicSine(float $number): float
    {
        return asinh($number);
    }

    /**
     *  This function calculates the arc tangent of the two variables x and y. It is similar to calculating
     * the arc tangent of y / x, except that the signs of both arguments are used to determine the quadrant
     * of the result.
     *
     * The function returns the result in radians, which is between -PI and PI (inclusive).
     *
     * @param float $y Dividend parameter.
     * @param float $x Divisor parameter.
     *
     * @return float The arc tangent of y/x in radians.
     *
     * @link https://www.php.net/manual/en/function.atan2.php
     */
    public static function atan2(float $y, float $x): float
    {
        return atan2($y, $x);
    }

    /**
     *  Returns the arc tangent of number in radians. atan() is the inverse function of tan(), which means
     * that a==tan(atan(a)) for every value of a that is within atan()'s range.
     *
     * @param float $number The argument to process.
     *
     * @return float The arc tangent of number in radians.
     *
     * @link https://www.php.net/manual/en/function.atan.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function atan(float $number): float
    {
        return self::arcTangent($number);
    }

    /**
     *  Returns the arc tangent of number in radians. atan() is the inverse function of tan(), which means
     * that a==tan(atan(a)) for every value of a that is within atan()'s range.
     *
     * @param float $number The argument to process.
     *
     * @return float The arc tangent of number in radians.
     *
     * @link https://www.php.net/manual/en/function.atan.php
     */
    public static function arcTangent(float $number): float
    {
        return atan($number);
    }

    /**
     * Returns the inverse hyperbolic tangent of number, i.e. the value whose hyperbolic tangent is number.
     *
     * @param float $number The argument to process.
     *
     * @return float Inverse hyperbolic tangent of number.
     *
     * @link https://www.php.net/manual/en/function.atanh.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function atanh(float $number): float
    {
        return self::inverseHyperbolicTangent($number);
    }

    /**
     * Returns the inverse hyperbolic tangent of number, i.e. the value whose hyperbolic tangent is number.
     *
     * @param float $number The argument to process.
     *
     * @return float Inverse hyperbolic tangent of number.
     *
     * @link https://www.php.net/manual/en/function.atanh.php
     */
    public static function inverseHyperbolicTangent(float $number): float
    {
        return atanh($number);
    }

    /**
     *  Returns a string containing number represented in base toBase. The base in which number is given is
     * specified in fromBase. Both fromBase and toBase have to be between 2 and 36, inclusive. Digits in
     * numbers with a base higher than 10 will be represented with the letters a-z, with a meaning 10, b
     * meaning 11 and z meaning 35. The case of the letters doesn't matter, i.e. number is interpreted
     * case-insensitively.
     *
     * <b>Warning: base_convert() may lose precision on large numbers due to properties related to the
     * internal float type used. Please see the
     * <a href="https://www.php.net/manual/en/language.types.float.php">Floating point numbers</a> section
     * in the manual for more specific information and limitations.</b>

     * @param string $number The number to convert. Any invalid characters in num are silently ignored.
     * @param int $fromBase The base number is in.
     * @param int $toBase The base to convert number to.
     *
     * @return string number converted to base toBase.
     *
     * @link https://www.php.net/manual/en/function.base-convert.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function base_convert(string $number, int $fromBase, int $toBase): string
    {
        return self::convertBase($number, $fromBase, $toBase);
    }

    /**
     *  Returns a string containing number represented in base toBase. The base in which number is given is
     * specified in fromBase. Both fromBase and toBase have to be between 2 and 36, inclusive. Digits in
     * numbers with a base higher than 10 will be represented with the letters a-z, with a meaning 10, b
     * meaning 11 and z meaning 35. The case of the letters doesn't matter, i.e. number is interpreted
     * case-insensitively.
     *
     * <b>Warning: convertBase() may lose precision on large numbers due to properties related to the
     * internal float type used. Please see the
     * <a href="https://www.php.net/manual/en/language.types.float.php">Floating point numbers</a> section
     * in the manual for more specific information and limitations.</b>

     * @param string $number The number to convert. Any invalid characters in num are silently ignored.
     * @param int $fromBase The base number is in.
     * @param int $toBase The base to convert number to.
     *
     * @return string number converted to base toBase.
     *
     * @link https://www.php.net/manual/en/function.base-convert.php
     */
    public static function convertBase(string $number, int $fromBase, int $toBase): string
    {
        return base_convert($number, $fromBase, $toBase);
    }

    /**
     *  Returns the decimal equivalent of the binary number represented by the binaryString argument.
     *
     * binaryToDecimal() converts a binary number to an int or, if needed for size reasons, float.
     *
     * binaryToDecimal() interprets all binaryString values as unsigned integers. This is because
     * binaryToDecimal() sees the most significant bit as another order of magnitude rather than as the
     * sign bit.
     *
     * @param string $binaryString The binary string to convert. Any invalid characters in binaryString are
     * silently ignored. <b>Warning: The parameter must be a string. Using other data types will produce
     * unexpected results.</b>
     *
     * @return int|float The decimal value of binaryString.
     *
     * @link https://www.php.net/manual/en/function.bindec.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function bindec(string $binaryString): int|float
    {
        return self::binaryToDecimal($binaryString);
    }

    /**
     *  Returns the decimal equivalent of the binary number represented by the binaryString argument.
     *
     * binaryToDecimal() converts a binary number to an int or, if needed for size reasons, float.
     *
     * binaryToDecimal() interprets all binaryString values as unsigned integers. This is because
     * binaryToDecimal() sees the most significant bit as another order of magnitude rather than as the
     * sign bit.
     *
     * @param string $binaryString The binary string to convert. Any invalid characters in binaryString are
     * silently ignored. <b>Warning: The parameter must be a string. Using other data types will produce
     * unexpected results.</b>
     *
     * @return int|float The decimal value of binaryString.
     *
     * @link https://www.php.net/manual/en/function.bindec.php
     */
    public static function binaryToDecimal(string $binaryString): int|float
    {
        return bindec($binaryString);
    }

    /**
     * Returns the next highest integer value by rounding up number if necessary.
     *
     * @param int|float $number The value to round.
     *
     * @return float number rounded up to the next highest integer. The return value of ceil() is still of
     * type float as the value range of float is usually bigger than that of int.
     *
     * @link https://www.php.net/manual/en/function.ceil.php
     */
    public static function ceil(int|float $number): float
    {
        return ceil($number);
    }

    /**
     * cosine() returns the cosine of the number parameter. The number parameter is in radians.
     *
     * @param float $number An angle in radians.
     *
     * @return float The cosine of number.
     *
     * @link https://www.php.net/manual/en/function.cos.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function cos(float $number): float
    {
        return self::cosine($number);
    }

    /**
     * cosine() returns the cosine of the number parameter. The number parameter is in radians.
     *
     * @param float $number An angle in radians.
     *
     * @return float The cosine of number.
     *
     * @link https://www.php.net/manual/en/function.cos.php
     */
    public static function cosine(float $number): float
    {
        return cos($number);
    }

    /**
     * Returns the hyperbolic cosine of number, defined as (exp(arg) + exp(-arg))/2.
     *
     * @param float $number The argument to process.
     *
     * @return float The hyperbolic cosine of num.
     *
     * @link https://www.php.net/manual/en/function.cosh.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function cosh(float $number): float
    {
        return self::hyperbolicCosine($number);
    }

    /**
     * Returns the hyperbolic cosine of number, defined as (exp(arg) + exp(-arg))/2.
     *
     * @param float $number The argument to process.
     *
     * @return float The hyperbolic cosine of num.
     *
     * @link https://www.php.net/manual/en/function.cosh.php
     */
    public static function hyperbolicCosine(float $number): float
    {
        return cosh($number);
    }

    /**
     * Returns a string containing a binary representation of the given number argument.
     *
     * @param int $number Decimal value to convert.
     * <table><tr><th>positive number</th><th>negative number</th><th>return value</th></tr>
     * <tr><td>0</td><td></td><td>0</td></tr>
     * <tr><td>1</td><td></td><td>1</td></tr>
     * <tr><td>2</td><td></td><td>10</td></tr>
     * <tr><td>... normal progression ...</td><td></td><td></td></tr>
     * <tr><td>9223372036854775806</td><td></td>
     * <td>111111111111111111111111111111111111111111111111111111111111110</td></tr>
     * <tr><td>9223372036854775807 (largest signed integer)</td><td></td>
     * <td>111111111111111111111111111111111111111111111111111111111111111 (63 1's)</td></tr>
     * <tr><td></td><td>-9223372036854775808</td>
     * <td>1000000000000000000000000000000000000000000000000000000000000000</td></tr>
     * <tr><td>... normal progression ...</td><td></td><td>0</td></tr>
     * <tr><td></td><td>-2</td><td>1111111111111111111111111111111111111111111111111111111111111110</td></tr>
     * <tr><td></td><td>-1</td>
     * <td>1111111111111111111111111111111111111111111111111111111111111111 (64 1's)</td></tr>
     * </table>
     *
     * @return string Binary string representation of number.
     *
     * @link https://www.php.net/manual/en/function.decbin.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function decbin(int $number): string
    {
        return self::decimalToBinary($number);
    }

    /**
     * Returns a string containing a binary representation of the given number argument.
     *
     * @param int $number Decimal value to convert.
     * <table><tr><th>positive number</th><th>negative number</th><th>return value</th></tr>
     * <tr><td>0</td><td></td><td>0</td></tr>
     * <tr><td>1</td><td></td><td>1</td></tr>
     * <tr><td>2</td><td></td><td>10</td></tr>
     * <tr><td>... normal progression ...</td><td></td><td></td></tr>
     * <tr><td>9223372036854775806</td><td></td>
     * <td>111111111111111111111111111111111111111111111111111111111111110</td></tr>
     * <tr><td>9223372036854775807 (largest signed integer)</td><td></td>
     * <td>111111111111111111111111111111111111111111111111111111111111111 (63 1's)</td></tr>
     * <tr><td></td><td>-9223372036854775808</td>
     * <td>1000000000000000000000000000000000000000000000000000000000000000</td></tr>
     * <tr><td>... normal progression ...</td><td></td><td>0</td></tr>
     * <tr><td></td><td>-2</td><td>1111111111111111111111111111111111111111111111111111111111111110</td></tr>
     * <tr><td></td><td>-1</td>
     * <td>1111111111111111111111111111111111111111111111111111111111111111 (64 1's)</td></tr>
     * </table>
     *
     * @return string Binary string representation of number.
     *
     * @link https://www.php.net/manual/en/function.decbin.php
     */
    public static function decimalToBinary(int $number): string
    {
        return decbin($number);
    }

    /**
     * Returns a string containing a hexadecimal representation of the given unsigned number argument.
     *
     *  The largest number that can be converted is PHP_INT_MAX * 2 + 1 (or -1): on 32-bit platforms, this
     * will be 4294967295 in decimal, which results in dechex() returning ffffffff.
     *
     * @param int $number The decimal value to convert. As PHP's int type is signed, but dechex() deals
     * with unsigned integers, negative integers will be treated as though they were unsigned.
     *
     * @return string Hexadecimal string representation of number.
     *
     * @link https://www.php.net/manual/en/function.dechex.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function dechex(int $number): string
    {
        return self::decimalToHexadecimal($number);
    }

    /**
     * Returns a string containing a hexadecimal representation of the given unsigned number argument.
     *
     *  The largest number that can be converted is PHP_INT_MAX * 2 + 1 (or -1): on 32-bit platforms, this
     * will be 4294967295 in decimal, which results in decimalToHexadecimal() returning ffffffff.
     *
     * @param int $number The decimal value to convert. As PHP's int type is signed, but
     * decimalToHexadecimal() deals with unsigned integers, negative integers will be treated as though
     * they were unsigned.
     *
     * @return string Hexadecimal string representation of number.
     *
     * @link https://www.php.net/manual/en/function.dechex.php
     */
    public static function decimalToHexadecimal(int $number): string
    {
        return dechex($number);
    }

    /**
     *  Returns a string containing an octal representation of the given number argument. The largest number
     * that can be converted depends on the platform in use. For 32-bit platforms this is usually 4294967295
     * in decimal resulting in 37777777777. For 64-bit platforms this is usually 9223372036854775807 in
     * decimal resulting in 777777777777777777777.
     *
     * @param int $number Decimal value to convert.
     *
     * @return string Octal string representation of number.
     *
     * @link https://www.php.net/manual/en/function.decoct.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function decoct(int $number): string
    {
        return self::decimalToOctal($number);
    }

    /**
     *  Returns a string containing an octal representation of the given number argument. The largest number
     * that can be converted depends on the platform in use. For 32-bit platforms this is usually 4294967295
     * in decimal resulting in 37777777777. For 64-bit platforms this is usually 9223372036854775807 in
     * decimal resulting in 777777777777777777777.
     *
     * @param int $number Decimal value to convert.
     *
     * @return string Octal string representation of number.
     *
     * @link https://www.php.net/manual/en/function.decoct.php
     */
    public static function decimalToOctal(int $number): string
    {
        return decoct($number);
    }

    /**
     * This function converts number from degrees to the radian equivalent.
     *
     * @param float $number Angular value in degrees.
     *
     * @return float The radian equivalent of number.
     *
     * @link https://www.php.net/manual/en/function.deg2rad.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function deg2rad(float $number): float
    {
        return self::degreesToRadian($number);
    }

    /**
     * This function converts number from degrees to the radian equivalent.
     *
     * @param float $number Angular value in degrees.
     *
     * @return float The radian equivalent of number.
     *
     * @link https://www.php.net/manual/en/function.deg2rad.php
     */
    public static function degreesToRadian(float $number): float
    {
        return deg2rad($number);
    }

    /**
     * Returns e raised to the power of number.
     * <b>Note: 'e'</b> is the base of the natural system of logarithms, or approximately 2.718282.
     *
     * @param float $number The argument to process.
     *
     * @return float 'e' raised to the power of number.
     *
     * @link https://www.php.net/manual/en/function.exp.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function exp(float $number): float
    {
        return self::exponent($number);
    }

    /**
     * Returns e raised to the power of number.
     * <b>Note: 'e'</b> is the base of the natural system of logarithms, or approximately 2.718282.
     *
     * @param float $number The argument to process.
     *
     * @return float 'e' raised to the power of number.
     *
     * @link https://www.php.net/manual/en/function.exp.php
     */
    public static function exponent(float $number): float
    {
        return exp($number);
    }

    /**
     *  expm1() returns the equivalent to 'exp(number) - 1' computed in a way that is accurate even if the
     * value of number is near zero, a case where 'exp (number) - 1' would be inaccurate due to subtraction
     * of two numbers that are nearly equal.
     *
     * @param float $number The argument to process.
     *
     * @return float 'e' to the power of number minus one.
     *
     * @link https://www.php.net/manual/en/function.expm1.php
     */
    public static function expm1(float $number): float
    {
        return expm1($number);
    }

    /**
     *  Returns the floating point result of dividing the number1 by the number2. If the number2 is zero, then
     * one of INF, -INF, or NAN will be returned.
     * Note that in comparisons, NAN will never == or ===, any value, including itself.
     *
     * @param float $number1 The dividend (numerator).
     * @param float $number2 The divisor.
     *
     * @return float The floating point result of number1/number2.
     *
     * @link https://www.php.net/manual/en/function.fdiv.php
     */
    public static function fdiv(float $number1, float $number2): float
    {
        return fdiv($number1, $number2);
    }

    /**
     * Returns the next lowest integer value (as float) by rounding down number if necessary.
     *
     * @param int|float $number The numeric value to round.
     *
     * @return float number rounded to the next lowest integer. The return value of floor() is still of type
     * float because the value range of float is usually bigger than that of int.
     *
     * @link https://www.php.net/manual/en/function.floor.php
     */
    public static function floor(int|float $number): float
    {
        return floor($number);
    }

    /**
     *  Returns the floating point remainder of dividing the dividend (number1) by the divisor (number2).
     * The remainder (r) is defined as: number1 = i * number2 + r, for some integer i. If number2 is
     * non-zero, r has the same sign as number1 and a magnitude less than the magnitude of number2.
     *
     * @param float $number1 The dividend.
     * @param float $number2 The divisor.
     *
     * @return float The floating point remainder of number1/number2.
     *
     * @link https://www.php.net/manual/en/function.fmod.php
     */
    public static function fmod(float $number1, float $number2): float
    {
        return fmod($number1, $number2);
    }

    /**
     * Returns the maximum value that can be returned by a call to rand().
     *
     * @return int The largest possible random value returned by rand().
     *
     * @link https://www.php.net/manual/en/function.getrandmax.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function getrandmax(): int
    {
        return self::getLargestRandomValue();
    }

    /**
     * Returns the maximum value that can be returned by a call to rand().
     *
     * @return int The largest possible random value returned by rand().
     *
     * @link https://www.php.net/manual/en/function.getrandmax.php
     */
    public static function getLargestRandomValue(): int
    {
        return getrandmax();
    }

    /**
     *  Returns the decimal equivalent of the hexadecimal number represented by the hexString argument.
     * hexadecimalToDecimal() converts a hexadecimal string to a decimal number.
     *
     * hexadecimalToDecimal() will ignore any non-hexadecimal characters it encounters.
     *
     * @param string $hexString The hexadecimal string to convert.
     *
     * @return int|float The decimal representation of hexString.
     *
     * @link https://www.php.net/manual/en/function.hexdec.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function hexdec(string $hexString): int|float
    {
        return self::hexadecimalToDecimal($hexString);
    }

    /**
     *  Returns the decimal equivalent of the hexadecimal number represented by the hexString argument.
     * hexadecimalToDecimal() converts a hexadecimal string to a decimal number.
     *
     * hexadecimalToDecimal() will ignore any non-hexadecimal characters it encounters.
     *
     * @param string $hexString The hexadecimal string to convert.
     *
     * @return int|float The decimal representation of hexString.
     *
     * @link https://www.php.net/manual/en/function.hexdec.php
     */
    public static function hexadecimalToDecimal(string $hexString): int|float
    {
        return hexdec($hexString);
    }

    /**
     *  hypot() returns the length of the hypotenuse of a right-angle triangle with sides of length x and
     * y, or the distance of the point (x, y) from the origin. This is equivalent to sqrt(x*x + y*y).
     *
     * @param float $x Length of first side.
     * @param float $y Length of second side.
     *
     * @return float Calculated length of the hypotenuse.
     *
     * @link https://www.php.net/manual/en/function.hypot.php
     */
    public static function hypot(float $x, float $y): float
    {
        return hypot($x, $y);
    }

    /**
     * Returns the integer quotient of the division of number1 by number2.
     *
     * @param int $number1 Number to be divided.
     * @param int $number2 Number which divides the num1.
     *
     * @return float he integer quotient of the division of num1 by num2.
     *
     * @link https://www.php.net/manual/en/function.intdiv.php
     */
    public static function intdiv(int $number1, int $number2): float
    {
        return intdiv($number1, $number2);
    }

    /**
     * Checks whether number is a legal finite on this platform.
     *
     * @param float $number The value to check
     *
     * @return bool true if number is a legal finite number within the allowed range for a PHP float on this
     * platform, else false.
     *
     * @link https://www.php.net/manual/en/function.is-finite.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function is_finite(float $number): bool
    {
        return self::isFinite($number);
    }

    /**
     * Checks whether number is a legal finite on this platform.
     *
     * @param float $number The value to check
     *
     * @return bool true if number is a legal finite number within the allowed range for a PHP float on this
     * platform, else false.
     *
     * @link https://www.php.net/manual/en/function.is-finite.php
     */
    public static function isFinite(float $number): bool
    {
        return is_finite($number);
    }

    /**
     *  Returns true if number is infinite (positive or negative), like the result of log(0) or any value too
     * big to fit into a float on this platform.
     *
     * @param float $number The value to check.
     *
     * @return bool true if number is infinite, else false.
     *
     * @link https://www.php.net/manual/en/function.is-infinite.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function is_infinite(float $number): bool
    {
        return self::isInfinite($number);
    }

    /**
     *  Returns true if number is infinite (positive or negative), like the result of log(0) or any value too
     * big to fit into a float on this platform.
     *
     * @param float $number The value to check.
     *
     * @return bool true if number is infinite, else false.
     *
     * @link https://www.php.net/manual/en/function.is-infinite.php
     */
    public static function isInfinite(float $number): bool
    {
        return is_infinite($number);
    }

    /**
     * Checks whether number is 'not a number', like the result of acos(1.01).
     *
     * @param float $number The value to check.
     *
     * @return bool Returns true if number is 'not a number', else false.
     *
     * @link https://www.php.net/manual/en/function.is-nan.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function is_nan(float $number): bool
    {
        return self::isNaN($number);
    }

    /**
     * Checks whether number is 'not a number', like the result of acos(1.01).
     *
     * @param float $number The value to check.
     *
     * @return bool Returns true if number is 'not a number', else false.
     *
     * @link https://www.php.net/manual/en/function.is-nan.php
     */
    public static function isNaN(float $number): bool
    {
        return is_nan($number);
    }

    /**
     *  lcg_value() returns a pseudo random number in the range of (0, 1). The method combines two CGs
     * with periods of 2^31 - 85 and 2^31 - 249. The period of this method is equal to the product of both
     * primes.
     *
     * @return float A pseudo random float value between 0.0 and 1.0, inclusive.
     *
     * @link https://www.php.net/manual/en/function.lcg-value.php
     *
     * @deprecated For PHP compatibility only.
     */
    public static function lcg_value(): float
    {
        return self::randomLCG();
    }

    /**
     *  randomLCG() returns a pseudo random number in the range of (0, 1). The method combines two CGs
     * with periods of 2^31 - 85 and 2^31 - 249. The period of this method is equal to the product of both
     * primes.
     *
     * @return float A pseudo random float value between 0.0 and 1.0, inclusive.
     *
     * @link https://www.php.net/manual/en/function.lcg-value.php
     */
    public static function randomLCG(): float
    {
        return lcg_value();
    }

    /**
     * Returns the base-10 logarithm of number.
     *
     * @param float $number The argument to process.
     *
     * @return float The base-10 logarithm of number.
     *
     * @link https://www.php.net/manual/en/function.log10.php
     */
    public static function log10(float $number): float
    {
        return log10($number);
    }

    /**
     *  log1p() returns log(1 + number) computed in a way that is accurate even when the value of number is
     * close to zero. log() might only return log(1) in this case due to lack of precision.
     *
     * @param float $number The argument to process.
     *
     * @return float log(1 + number)
     *
     * @link https://www.php.net/manual/en/function.log1p.php
     */
    public static function log1p(float $number): float
    {
        return log1p($number);
    }

    /**
     *  If the optional base parameter is specified, log() returns log<i>base</i> number, otherwise log()
     * returns the natural logarithm of number.
     *
     * @param float $number The value to calculate the logarithm for.
     * @param float $base The optional logarithmic base to use (defaults to 'e' and so to the natural
     * logarithm).
     *
     * @return float The logarithm of number to base, if given, or the natural logarithm.
     *
     * @link https://www.php.net/manual/en/function.log.php
     */
    public static function log(float $number, float $base = self::E): float
    {
        return log($number, $base);
    }

    /**
     * Returns the biggest of these values.
     *
     * @param int|float ...$values Any comparable values.
     *
     * @return int|float max() returns the parameter value considered "highest" according to standard
     * comparisons.
     *
     * @link https://www.php.net/manual/en/function.max.php
     */
    public static function max(int|float ...$values): int|float
    {
        $max = max(...$values);

        if ($max === false || !is_numeric($max)) {
            throw new ValueError("Failed to get max value!");
        }

        if (is_int($max) || is_float($max)) {
            return $max;
        }

        return (float) $max;
    }

    /**
     * Returns the lowest of these values.
     *
     * @param int|float ...$values Any comparable values.
     *
     * @return int|float min() returns the parameter value considered "lowest" according to standard
     * comparisons.
     *
     * @link https://www.php.net/manual/en/function.min.php
     */
    public static function min(int|float ...$values): int|float
    {
        $min = min(...$values);

        if ($min === false || !is_numeric($min)) {
            throw new ValueError("Failed to get min value!");
        }

        if (is_int($min) || is_float($min)) {
            return $min;
        }

        return (float) $min;
    }

    /**
     * Returns the maximum value that can be returned by a call to randMT().
     *
     * @return int Returns the maximum random value returned by a call to randMT() without arguments, which
     * is the maximum value that can be used for its max parameter without the result being scaled up (and
     * therefore less random).
     *
     * @link https://www.php.net/manual/en/function.mt-getrandmax.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function mt_getrandmax(): int
    {
        return self::getLargestRandomValueMT();
    }

    /**
     * Returns the maximum value that can be returned by a call to randMT().
     *
     * @return int Returns the maximum random value returned by a call to randMT() without arguments, which
     * is the maximum value that can be used for its max parameter without the result being scaled up (and
     * therefore less random).
     *
     * @link https://www.php.net/manual/en/function.mt-getrandmax.php
     */
    public static function getLargestRandomValueMT(): int
    {
        return mt_getrandmax();
    }

    /**
     *  Many random number generators of older libcs have dubious or unknown characteristics and are slow.
     * The randMT() function is a drop-in replacement for the older rand(). It uses a random number
     * generator with known characteristics using the Mersenne Twister, which will produce random numbers
     * four times faster than what the average libc rand() provides.
     *
     *  If called without the optional min, max arguments randMT() returns a pseudo-random value between 0
     * and getLargestRandomValueMT(). If you want a random number between 5 and 15 (inclusive), for
     * example, use randMT(5, 15).
     *
     * @param int|null $min Optional lowest value to be returned (default: 0)
     * @param int|null $max Optional highest value to be returned (default: getLargestRandomValueMT())
     *
     * @return int A random integer value between min (or 0) and max (or mt_getrandmax(), inclusive).
     *
     * @link https://www.php.net/manual/en/function.mt-rand.php
     *
     * @deprecated For PHP compatibility only.
     */
    public static function mt_rand(?int $min = null, ?int $max = null): int
    {
        return self::randMT($min, $max);
    }

    /**
     *  Many random number generators of older libcs have dubious or unknown characteristics and are slow.
     * The randMT() function is a drop-in replacement for the older rand(). It uses a random number
     * generator with known characteristics using the Mersenne Twister, which will produce random numbers
     * four times faster than what the average libc rand() provides.
     *
     *  If called without the optional min, max arguments randMT() returns a pseudo-random value between 0
     * and getLargestRandomValueMT(). If you want a random number between 5 and 15 (inclusive), for
     * example, use randMT(5, 15).
     *
     * @param int|null $min Optional lowest value to be returned (default: 0)
     * @param int|null $max Optional highest value to be returned (default: getLargestRandomValueMT())
     *
     * @return int A random integer value between min (or 0) and max (or mt_getrandmax(), inclusive).
     *
     * @link https://www.php.net/manual/en/function.mt-rand.php
     */
    public static function randMT(?int $min = null, ?int $max = null): int
    {
        if ($min === null) {
            return mt_rand();
        }

        if ($max !== null && $min > $max) {
            throw new ValueError("min must be bigger than max!");
        }

        return mt_rand($min, $max);
    }

    /**
     * Seeds the random number generator with seed or with a random value if no seed is given.
     *
     * @param int $seed An arbitrary int seed value.
     * @param int $mode Use one of the following constants to specify the implementation of the algorithm
     * to use.
     * <table><tr><th>Constant</th><th>Description</th></tr>
     * <tr><td>MT_RAND_MT19937</td><td>Uses the fixed, correct, Mersenne Twister implementation</td></tr>
     * <tr><td>MT_RAND_PHP</td><td>Uses an incorrect Mersenne Twister implementation wich was used as default
     * up till PHP 7.1.0. This mode is available for backward compatibility.</td></tr></table>
     *
     * @return void
     *
     * @link https://www.php.net/manual/en/function.mt-srand.php
     *
     * @deprecated For PHP compatibility only.
     */
    public static function mt_srand(int $seed = 0, int $mode = MT_RAND_MT19937): void
    {
        self::srandMT($seed, $mode);
    }

    /**
     * Seeds the random number generator with seed or with a random value if no seed is given.
     *
     * @param int $seed An arbitrary int seed value.
     * @param int $mode Use one of the following constants to specify the implementation of the algorithm
     * to use.
     * <table><tr><th>Constant</th><th>Description</th></tr>
     * <tr><td>MT_RAND_MT19937</td><td>Uses the fixed, correct, Mersenne Twister implementation</td></tr>
     * <tr><td>MT_RAND_PHP</td><td>Uses an incorrect Mersenne Twister implementation wich was used as default
     * up till PHP 7.1.0. This mode is available for backward compatibility.</td></tr></table>
     *
     * @return void
     *
     * @link https://www.php.net/manual/en/function.mt-srand.php
     */
    public static function srandMT(int $seed = 0, int $mode = MT_RAND_MT19937): void
    {
        mt_srand($seed, $mode);
    }

    /**
     * Returns the decimal equivalent of the octal number represented by the octalString argument.
     *
     * @param string $octalString The octal string to convert. Any invalid characters in octalString are
     * silently ignored.
     *
     * @return int|float The decimal representation of octalString
     *
     * @link https://www.php.net/manual/en/function.octdec.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function octdec(string $octalString): int|float
    {
        return self::octalToDecimal($octalString);
    }

    /**
     * Returns the decimal equivalent of the octal number represented by the octalString argument.
     *
     * @param string $octalString The octal string to convert. Any invalid characters in octalString are
     * silently ignored.
     *
     * @return int|float The decimal representation of octalString
     *
     * @link https://www.php.net/manual/en/function.octdec.php
     */
    public static function octalToDecimal(string $octalString): int|float
    {
        return octdec($octalString);
    }

    /**
     *  Returns an approximation of pi. Also, you can use the self::PI constant which yields identical
     * results to pi().
     *
     * @return float The value of pi as float.
     *
     * @link https://www.php.net/manual/en/function.pi.php
     */
    public static function pi(): float
    {
        return self::PI;
    }

    /**
     * Returns number raised to the power of exponent.
     *
     * @param int|float $number The base to use.
     * @param int|float $exponent The exponent.
     *
     * @return int|float number raised to the power of exponent. If both arguments are non-negative integers
     * and the result can be represented as an integer, the result will be returned with int type,
     * otherwise it will be returned as a float.
     *
     * @link https://www.php.net/manual/en/function.pow.php
     */
    public static function pow(int|float $number, int|float $exponent): int|float
    {
        $result = pow($number, $exponent);

        if (is_object($result)) {
            throw new CompileError();
        }

        return $result;
    }

    /**
     * This function converts number from radian to degrees.
     *
     * @param float $number A radian value.
     *
     * @return float The equivalent of number in degrees.
     *
     * @link https://www.php.net/manual/en/function.rad2deg.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function rad2deg(float $number): float
    {
        return self::radianToDegrees($number);
    }

    /**
     * This function converts number from radian to degrees.
     *
     * @param float $number A radian value.
     *
     * @return float The equivalent of number in degrees.
     *
     * @link https://www.php.net/manual/en/function.rad2deg.php
     */
    public static function radianToDegrees(float $number): float
    {
        return rad2deg($number);
    }

    /**
     *  If called without the optional min, max arguments rand() returns a pseudo-random integer between 0
     * and getLargestRandomValue(). If you want a random number between 5 and 15 (inclusive), for example,
     * use rand(5, 15).
     *
     * @param int|null $min The lowest value to return (default: 0)
     * @param int|null $max The highest value to return (default: getLargestRandomValue())
     *
     * @return int A pseudo random value between min (or 0) and max (or getLargestRandomValue(), inclusive).
     *
     * @link https://www.php.net/manual/en/function.rand.php
     */
    public static function rand(?int $min = null, ?int $max = null): int
    {
        if ($min === null) {
            return rand();
        }

        if ($max !== null && $min > $max) {
            throw new ValueError("min must be bigger than max!");
        }

        return rand($min, $max);
    }

    /**
     *  Returns the rounded value of number to specified precision (number of digits after the decimal point).
     * precision can also be negative or zero (default).
     *
     * @param int|float $number The value to round.
     * @param int $precision The optional number of decimal digits to round to.
     *
     *  If the precision is positive, number is rounded to precision significant digits after the decimal
     * point.
     *
     *  If the precision is negative, number is rounded to precision significant digits before the decimal
     * point, i.e. to the nearest multiple of pow(10, -precision), e.g. for a precision of -1 number is
     * rounded to tens, for a precision of -2 to hundreds, etc.
     * @param int $mode Use one of the following constants to specify the mode in which rounding occurs.
     * <table><tr><th>Constants</th><th>Description</th></tr>
     * <tr><td>PHP_ROUND_HALF_UP</td><td> Rounds number away from zero when it is half way there, making 1.5
     * into 2 and -1.5 into -2.</td></tr>
     * <tr><td>PHP_ROUND_HALF_DOWN</td><td>Rounds number towards zero when it is half way there, making 1.5
     * into 1 and -1.5 into -1.</td></tr>
     * <tr><td>PHP_ROUND_HALF_EVEN</td><td>Rounds number towards the nearest even value when it is half way
     * there, making both 1.5 and 2.5 into 2.</td></tr>
     * <tr><td>PHP_ROUND_HALF_ODD</td><td>Rounds number towards the nearest odd value when it is half way
     * there, making 1.5 into 1 and 2.5 into 3.</td></tr></table>
     *
     * @return float The value rounded to the given precision as a float.
     *
     * @link https://www.php.net/manual/en/function.round.php
     */
    public static function round(int|float $number, int $precision = 0, int $mode = PHP_ROUND_HALF_UP): float
    {
        return round($number, $precision, $mode);
    }

    /**
     * sin() returns the sine of the number parameter. The number parameter is in radians.
     *
     * @param float $number A value in radians.
     *
     * @return float The sine of number.
     *
     * @link https://www.php.net/manual/en/function.sin.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function sin(float $number): float
    {
        return self::sine($number);
    }

    /**
     * sine() returns the sine of the number parameter. The number parameter is in radians.
     *
     * @param float $number A value in radians.
     *
     * @return float The sine of number.
     *
     * @link https://www.php.net/manual/en/function.sin.php
     */
    public static function sine(float $number): float
    {
        return sin($number);
    }

    /**
     * Returns the hyperbolic sine of number, defined as (exp(number) - exp(-number))/2.
     *
     * @param float $number The argument to process.
     *
     * @return float The hyperbolic sine of number.
     *
     * @link https://www.php.net/manual/en/function.sinh.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function sinh(float $number): float
    {
        return self::hyperbolicSine($number);
    }

    /**
     * Returns the hyperbolic sine of number, defined as (exp(number) - exp(-number))/2.
     *
     * @param float $number The argument to process.
     *
     * @return float The hyperbolic sine of number.
     *
     * @link https://www.php.net/manual/en/function.sinh.php
     */
    public static function hyperbolicSine(float $number): float
    {
        return sinh($number);
    }

    /**
     * Returns the square root of number.
     *
     * @param float $number The argument to process.
     *
     * @return float The square root of number or the special value NAN for negative numbers.
     *
     * @link https://www.php.net/manual/en/function.sqrt.php
     */
    public static function sqrt(float $number): float
    {
        return sqrt($number);
    }

    /**
     * Seeds the random number generator with seed or with a random value if no seed is given.
     *
     * @param int $seed An arbitrary int seed value.
     * @param int $mode Use one of the following constants to specify the implementation of the algorithm
     * to use.
     * <table><tr><th>Constant</th><th>Description</th></tr>
     * <tr><td>MT_RAND_MT19937</td><td>Uses the fixed, correct, Mersenne Twister implementation</td></tr>
     * <tr><td>MT_RAND_PHP</td><td>Uses an incorrect Mersenne Twister implementation wich was used as default
     * up till PHP 7.1.0. This mode is available for backward compatibility.</td></tr></table>
     *
     * @return void
     *
     * @link https://www.php.net/manual/en/function.srand.php
     */
    public static function srand(int $seed = 0, int $mode = MT_RAND_MT19937): void
    {
        self::srandMT($seed, $mode);
    }

    /**
     * tangent() returns the tangent of the number parameter. The number parameter is in radians.
     *
     * @param float $number The argument to process in radians.
     *
     * @return float The tangent of number.
     *
     * @link https://www.php.net/manual/en/function.tan.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function tan(float $number): float
    {
        return self::tangent($number);
    }

    /**
     * tangent() returns the tangent of the number parameter. The number parameter is in radians.
     *
     * @param float $number The argument to process in radians.
     *
     * @return float The tangent of number.
     *
     * @link https://www.php.net/manual/en/function.tan.php
     */
    public static function tangent(float $number): float
    {
        return tan($number);
    }

    /**
     * Returns the hyperbolic tangent of number, defined as sinh(number)/cosh(number).
     *
     * @param float $number The argument to process.
     *
     * @return float The hyperbolic tangent of number.
     *
     * @link https://www.php.net/manual/en/function.tanh.php
     *
     * @deprecated For PHP compatibility only.
     */
    #[Pure]
    public static function tanh(float $number): float
    {
        return self::hyperbolicTangent($number);
    }

    /**
     * Returns the hyperbolic tangent of number, defined as sinh(number)/cosh(number).
     *
     * @param float $number The argument to process.
     *
     * @return float The hyperbolic tangent of number.
     *
     * @link https://www.php.net/manual/en/function.tanh.php
     */
    public static function hyperbolicTangent(float $number): float
    {
        return tanh($number);
    }

    /**
     * Returns opposite of number.
     *
     * @param int|float $number Number to process.
     *
     * @return int|float Opposite of number.
     */
    public static function negate(int|float $number): int|float
    {
        return -$number;
    }

    /**
     * Returns a result of adding provided numbers.
     *
     * @param int|float ...$numbers Numbers to process.
     *
     * @return int|float Sum of numbers.
     */
    public static function sum(int|float ...$numbers): int|float
    {
        $sum = 0;

        foreach ($numbers as $number) {
            $sum += $number;
        }

        return $sum;
    }

    /**
     * Returns difference of number and provided numbers.
     *
     * @param int|float $number Minuend.
     * @param int|float ...$numbers Subtrahends.
     *
     * @return int|float Difference.
     */
    public static function diff(int|float $number, int|float ...$numbers): int|float
    {
        foreach ($numbers as $n) {
            $number -= $n;
        }

        return $number;
    }

    /**
     * Returns product of multiplication of provided numbers.
     *
     * @param int|float $number Multiplier.
     * @param int|float ...$numbers Multiplicands.
     *
     * @return int|float Product of multiplication.
     */
    public static function product(int|float $number, int|float ...$numbers): int|float
    {
        foreach ($numbers as $n) {
            $number = $number * $n;
        }

        return $number;
    }

    /**
     * Returns ratio of numbers.
     *
     * @param int|float $number Dividend.
     * @param int|float ...$numbers Divisors.
     *
     * @return int|float Ratio.
     */
    public static function ratio(int|float $number, int|float ...$numbers): int|float
    {
        foreach ($numbers as $n) {
            $number = $number/$n;
        }

        return $number;
    }
}
