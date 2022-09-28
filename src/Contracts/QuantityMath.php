<?php

namespace MiBo\Properties\Contracts;

use JetBrains\PhpStorm\ArrayShape;
use MiBo\Properties\Property;
use MiBo\Properties\Quantities\AmountOfSubstance;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\ElectricCurrent;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Quantities\LuminousIntensity;
use MiBo\Properties\Quantities\Mass;
use MiBo\Properties\Quantities\NoQuantity;
use MiBo\Properties\Quantities\Temperature;
use MiBo\Properties\Quantities\Time;
use MiBo\Properties\Quantities\Volume;
use MiBo\Properties\Units\NoQuantity\NoUnit;

/**
 * Class QuantityMath
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
class QuantityMath
{
    public const CONVERT_TO_FIRST = 1;
    public const CONVERT_TO_SECOND = 2;
    public const CONVERT_TO_FINAL = 3;
    public const CONVERT_TO_SMALLEST = 4;

    public static array $quantities = [];

    public static function sum(Property $first, Property $second, ?Unit $unit = null, int $mode = self::CONVERT_TO_SMALLEST)
    {
        self::validateInput($first, $second, $unit);

        $unit = $unit !== null ? $unit : $first->getUnit();

        // No need to convert while sum
        if ($first->getUnit()->getMultiplier() === $second->getUnit()->getMultiplier()) {
            $value = $first->getValue() + $second->getValue();

            if ($unit->getMultiplier() !== $first->getUnit()->getMultiplier()) {
                $value = $value / ($unit->getMultiplier() / $first->getUnit()->getMultiplier());
            }

            return self::create($first, $value, $unit);
        }

        $converted = self::convertByMode($first, $second, $unit, $mode);
        $first = $converted["first"];
        $second = $converted["second"];

        $value = $first->getValue() + $second->getValue();

        if ($first->getUnit()->getMultiplier() === $unit->getMultiplier()) {
            return self::create($first, $value, $unit);
        }

        return self::create(
            $first,
            $value / ($unit->getMultiplier() / $first->getUnit()->getMultiplier()),
            $unit
        );
    }

    public static function subtract(Property $first, Property $second, ?Unit $unit = null, int $mode = self::CONVERT_TO_SMALLEST)
    {
        self::validateInput($first, $second, $unit);

        $unit = $unit !== null ? $unit : $first->getUnit();

        // No need to convert while sum
        if ($first->getUnit()->getMultiplier() === $second->getUnit()->getMultiplier()) {
            $value = $first->getValue() - $second->getValue();

            if ($unit->getMultiplier() !== $first->getUnit()->getMultiplier()) {
                $value = $value / ($unit->getMultiplier() / $first->getUnit()->getMultiplier());
            }

            return self::create($first, $value, $unit);
        }

        $converted = self::convertByMode($first, $second, $unit, $mode);
        $first = $converted["first"];
        $second = $converted["second"];

        $value = $first->getValue() - $second->getValue();

        if ($first->getUnit()->getMultiplier() === $unit->getMultiplier()) {
            return self::create($first, $value, $unit);
        }

        return self::create(
            $first,
            $value / ($unit->getMultiplier() / $first->getUnit()->getMultiplier()),
            $unit
        );
    }

    public static function product(Property $first, Property $second, ?Unit $unit = null)
    {
        static::init();

        $quantity = null;

        foreach (static::$quantities as $q) {
            if ($q instanceof Derived) {
                $equation1 = strtr(
                    "(%first%) * (%second%)",
                    [
                        "%first%"  => $first->getQuantityClass()->getSymbol(),
                        "%second%" => $second->getQuantityClass()->getSymbol(),
                    ]
                );
                $equation2 = strtr(
                    "(%first%) * (%second%)",
                    [
                        "%first%"  => $second->getQuantityClass()->getSymbol(),
                        "%second%" => $first->getQuantityClass()->getSymbol(),
                    ]
                );

                if (static::isEquation($q->getEquation(), $equation1) ||
                    static::isEquation($q->getEquation(), $equation2)) {
                    $quantity = $q;

                    break;
                }
            }
        }

        if ($quantity === null) {
            $unit = NoUnit::get();

            $quantity = new class($first, $second, $unit) implements Derived {

                protected Unit $unit;
                protected Property $first;
                protected Property $second;

                public function __construct(Property $first, Property $second, Unit $unit)
                {
                    $this->unit = $unit;
                    $this->first = $first;
                    $this->second = $second;
                }

                public function getRequiredQuantities(): array
                {
                    return [
                        $this->first->getQuantityClass(),
                        $this->second->getQuantityClass(),
                    ];
                }

                public function getEquation(): string
                {
                    return strtr(
                        "(%first%) * (%second%)",
                        [
                            "%first%" => $this->first->getQuantityClass()->getSymbol(),
                            "%second%" => $this->second->getQuantityClass()->getSymbol(),
                        ]
                    );
                }

                public function getDefaultUnit(): Unit
                {
                    return $this->unit;
                }

                public function getSymbol(): string
                {
                    return $this->first->getQuantityClass()->getSymbol() .
                        "*" . $this->second->getQuantityClass()->getSymbol();
                }
            };
        }

        if (!$unit instanceof NoUnit && $unit::getQuantity() !== get_class($quantity)) {
            throw new \ValueError(); // incorrect unit
        }
        
        $property = self::create(
            Property::class,
            $first->getUnit()->useMultiplier($first->getValue()) *
            $second->getUnit()->useMultiplier($second->getValue()),
            $quantity->getDefaultUnit()
        );

        if ($quantity->getDefaultUnit()->getMultiplier() === $unit->getMultiplier()) {
            return $property;
        }

        return self::convertUnit($property, $unit);
    }

    private static function validateInput(Property $first, Property $second, ?Unit $unit): void
    {
        if ($first->getQuantity() !== $second->getQuantity()) {
            throw new \ValueError();
        }

        if ($unit !== null && $first->getQuantity() !== $unit::getQuantity()) {
            throw new \ValueError();
        }
    }

    protected static function create(string|Property $propertyName, int|float $value, Unit $unit)
    {
        if ($propertyName instanceof Property) {
            $propertyName = get_class($propertyName);
        }

        return new ($propertyName)($value, $unit);
    }

    /**
     * @param \MiBo\Properties\Property $first
     * @param \MiBo\Properties\Property $second
     * @param \MiBo\Properties\Contracts\Unit $unit
     * @param int $mode
     *
     * @return \MiBo\Properties\Property[]
     */
    #[ArrayShape(["first"  => "\MiBo\Properties\Property|mixed",
                  "second" => "\MiBo\Properties\Property|mixed"
    ])]
    protected static function convertByMode(
        Property $first,
        Property $second,
        Unit $unit,
        int $mode = self::CONVERT_TO_SMALLEST
    ): array
    {
        switch ($mode) {
            case self::CONVERT_TO_FIRST:
                $second = self::convertUnit($second, $first->getUnit());
                break;
            case self::CONVERT_TO_SECOND:
                $first = self::convertUnit($first, $second->getUnit());
                break;
            case self::CONVERT_TO_SMALLEST:
                if ($first->getUnit()->useMultiplier($first->getValue()) >
                    $second->getUnit()->useMultiplier($second->getValue())) {
                    $first = self::convertUnit($first, $second->getUnit());
                } else {
                    $second = self::convertUnit($second, $first->getUnit());
                }
                break;
            default:
            case self::CONVERT_TO_FINAL:
                $first = self::convertUnit($first, $unit);
                $second = self::convertUnit($second, $unit);
                break;
        }

        return [
            "first" => $first,
            "second" => $second,
        ];
    }

    public static function toDefaultUnit(Property $property)
    {
        return self::convertUnit($property, $property->getQuantityClass()->getDefaultUnit());
    }

    public static function convertUnit(Property $property, Unit $unit)
    {
        if ($property->getUnit()::getQuantity() !== $unit::getQuantity()) {
            throw new \ValueError();
        }

        if ($property->getUnit()->getMultiplier() === $unit->getMultiplier()) {
            return $property;
        }

        return self::create(
            $property,
            $property->getValue() / ($unit->getMultiplier() / $property->getUnit()->getMultiplier()),
            $unit
        );
    }

    protected static function isEquation(string $expected, string $actual): bool
    {
        $expected = trim($expected);
        $actual = trim($actual);

        if ($expected === $actual) {
            return true;
        }

        if (count($division = explode("/", $actual)) === 2) {
            if (trim($division[0]) === trim($division[1]) && in_array($expected, ["", "1"])) {
                return true;
            }
        }

        return false;
    }

    protected static function init()
    {
        self::$quantities = [
            new AmountOfSubstance(),
            new Area(),
            new ElectricCurrent(),
            new Length(),
            new LuminousIntensity(),
            new Mass(),
            new NoQuantity(),
            new Temperature(),
            new Time(),
            new Volume(),
        ];
    }
}
