<?php

declare(strict_types = 1);

namespace MiBo\Properties\Traits;

use CompileError;
use MiBo\Properties\Contracts\Unit;

/**
 * Trait InternationSystemProperty
 *
 * @package MiBo\Properties\Traits
 *
 * @method static static ATTO(int|float|null $value = 0)
 * @method static static CENTI(int|float|null $value = 0)
 * @method static static DECA(int|float|null $value = 0)
 * @method static static DECI(int|float|null $value = 0)
 * @method static static EXA(int|float|null $value = 0)
 * @method static static FEMTO(int|float|null $value = 0)
 * @method static static GIGA(int|float|null $value = 0)
 * @method static static HECTO(int|float|null $value = 0)
 * @method static static KILO(int|float|null $value = 0)
 * @method static static MEGA(int|float|null $value = 0)
 * @method static static MICRO(int|float|null $value = 0)
 * @method static static MILLI(int|float|null $value = 0)
 * @method static static NANO(int|float|null $value = 0)
 * @method static static PETA(int|float|null $value = 0)
 * @method static static PICO(int|float|null $value = 0)
 * @method static static TERA(int|float|null $value = 0)
 * @method static static YOCTO(int|float|null $value = 0)
 * @method static static YOTTA(int|float|null $value = 0)
 * @method static static ZEPTO(int|float|null $value = 0)
 * @method static static ZETTA(int|float|null $value = 0)
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait InternationSystemProperty
{
    /**
     * @var array<string, string>
     */
    private static array $prefixes = [
        "ATTO"  => "Atto",
        "CENTI" => "Centi",
        "DECA"  => "Deca",
        "DECI"  => "Deci",
        "EXA"   => "Exa",
        "FEMTO" => "Femto",
        "GIGA"  => "Giga",
        "HECTO" => "Hecto",
        "KILO"  => "Kilo",
        "MEGA"  => "Mega",
        "MICRO" => "Micro",
        "MILLI" => "Milli",
        "NANO"  => "Nano",
        "PETA"  => "Peta",
        "PICO"  => "Pico",
        "TERA"  => "Tera",
        "YOCTO" => "Yocto",
        "YOTTA" => "Yotta",
        "ZEPTO" => "Zepto",
        "ZETTA" => "Zetta",
    ];

    /**
     * @param string $name
     * @param array<int, mixed> $arguments
     *
     * @return void|static
     */
    public static function __callStatic(string $name, array $arguments)
    {
        if (key_exists($name, self::$prefixes)) {
            $className = self::getClassToCreate(self::$prefixes[$name]);
            $value     = isset($arguments[0]) && is_numeric($arguments[0]) ? $arguments[0] : 0;

            /** @phpstan-ignore-next-line */
            return new static($value, $className::get());
        }
    }

    /**
     * @param string $prefix
     *
     * @return class-string<\MiBo\Properties\Contracts\Unit>
     */
    protected static function getClassToCreate(string $prefix): string
    {
        $calledProperty = static::class;
        $namespace      = preg_replace("/([\\ \w]+)$/", "", $calledProperty);
        $quantityClass  = preg_replace("/([\\\\\w]+\\\)/", "", static::getQuantityClassName());
        $unitNamespace  = $namespace . "Units\\" . $quantityClass . "\\";

        /** @var class-string<\MiBo\Properties\Contracts\Unit> */
        return $unitNamespace . $prefix . self::getDefaultISUnit();
    }

    abstract public static function getQuantityClassName(): string;

    abstract public static function getDefaultISUnit(): string;
}
