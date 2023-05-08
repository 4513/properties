<?php

declare(strict_types = 1);

namespace MiBo\Properties\Calculators;

use InvalidArgumentException;
use MiBo\Properties\Contracts\DerivedQuantity;
use MiBo\Properties\Contracts\Property;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Quantities\Volume;

/**
 * Class PropertyMath
 *
 * @package MiBo\Properties\Calculators
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PropertyCalc
{
    public static array $quantities = [
        Length::class,
        Area::class,
        Volume::class,
    ];

    protected static array $equations = [];

    public static array $productResolvers = [];

    protected static function merge(bool $add = true, int|float|Property ...$properties): int|float
    {
        $quantity     = null;
        $toUnit       = null;
        $sum          = 0;
        $initial      = null;

        foreach ($properties as $property) {
            if ($initial === null) {
                if ($property instanceof Property) {
                    $quantity     = $property::getQuantityClassName();
                    $toUnit       = $property->getUnit();
                    $initial      = $property->getValue();
                } else {
                    $initial = $property;
                }

                continue;
            }

            if ($property instanceof Property) {
                if ($quantity === null) {
                    $quantity = $property::getQuantityClassName();
                } elseif ($property::getQuantityClassName() !== $quantity) {
                    throw new InvalidArgumentException('Cannot add different quantities.');
                }

                if ($toUnit === null) {
                    $toUnit = $property->getUnit();
                }

                $sum += $property->convertToUnit($toUnit)->getValue();
            } else {
                $sum += $property;
            }
        }

        // No Property was passed, all the numbers were simple integers or floats.
        if ($quantity === null) {
            return $add ? $initial + $sum : $initial - $sum;
        }

        return $add ? $initial + $sum : $initial - $sum;
    }

    public static function add(int|float|Property $addend, int|float|Property ...$addends): int|float
    {
        return self::merge(true, $addend, ...$addends);
    }

    public static function subtract(int|float|Property $minuend, int|float|Property ...$subtrahends): int|float
    {
        return self::merge(false, $minuend, ...$subtrahends);
    }

    public static function multiple(
        int|float|Property $multiplier,
        int|float|Property ...$multiplicands
    ): int|float|Property
    {
        foreach ($multiplicands as $multiplicand) {
            $multiplier = self::multipleSingle($multiplier, $multiplicand);
        }

        return $multiplier;
    }

    public static function divide(
        int|float|Property $dividend,
        int|float|Property ...$divisors
    ): int|float|Property
    {
        foreach ($divisors as $divisor) {
            $dividend = self::divideSingle($dividend, $divisor);
        }

        return $dividend;
    }

    protected static function divideSingle(
        int|float|Property $dividend,
        int|float|Property $divisor
    ): int|float|Property
    {
        self::checkDivisor($divisor);

        if (!$dividend instanceof Property && !$divisor instanceof Property) {
            return $dividend / $divisor;
        }

        if ($dividend instanceof Property && !$divisor instanceof Property) {
            return new ($dividend::class)($dividend->getValue() / $divisor, $dividend->getUnit());
        }

        if (!$dividend instanceof Property && $divisor instanceof Property) {
            return new ($divisor::class)($dividend / $divisor->getValue(), $divisor->getUnit());
        }

        if ($dividend::getQuantityClassName() === $divisor::getQuantityClassName()) {
            $divisor = $divisor->convertToUnit($dividend->getUnit());

            return $dividend->getValue() / $divisor->getValue();
        }

        self::compileEquations();

        foreach (self::$equations as $product => $equations) {
            if ($product === $dividend::getQuantityClassName()) {
                continue;
            }

            foreach ($equations as $equation) {
                if (!str_contains($equation, " / ")) {
                    continue;
                }

                $firstHalf = preg_replace("/(\/.*)/", "", $equation);

                $parsed = preg_replace(
                    "/\(\%{$dividend::getQuantityClassName()::getDimensionSymbol()}\%\)/",
                    "{$dividend->getValue()}",
                    $firstHalf,
                    1
                );

                if ($parsed === $firstHalf) {
                    continue;
                }

                $parsed = preg_replace(
                    "/\(\%{$divisor::getQuantityClassName()::getDimensionSymbol()}\%\)/",
                    "{$divisor->getValue()}",
                    $equation,
                    1
                );

                if ($parsed === $equation) {
                    continue;
                }

                $unit     = $product::getDefaultUnit();
                $property = $product::getDefaultProperty();

                if (isset(self::$productResolvers[$product])) {
                    $newProperty = self::$productResolvers[$product]($dividend, $divisor);

                    if (!$newProperty instanceof Property || $newProperty::getQuantityClassName() !== $product) {
                        throw new \TypeError();
                    }

                    return $newProperty;
                }

                $dividend   = $dividend->convertToUnit($dividend::getQuantityClassName()::getDefaultUnit());
                $divisor = $divisor->convertToUnit($divisor::getQuantityClassName()::getDefaultUnit());

                return new ($property)($dividend->getValue() / $divisor->getValue(), $unit::get());
            }
        }

        throw new \ValueError();
    }

    protected static function checkDivisor(int|float|Property $divisor): void
    {
        if ($divisor instanceof Property && ($divisor->getValue() === 0 || $divisor->getValue() === 0.0)) {
            throw new InvalidArgumentException('Cannot divide by zero.');
        }

        if (!$divisor instanceof Property && ($divisor === 0 || $divisor === 0.0)) {
            throw new InvalidArgumentException('Cannot divide by zero.');
        }
    }

    protected static function multipleSingle(
        int|float|Property $multiplier,
        int|float|Property $multiplicand
    ): int|float|Property
    {
        if (!$multiplier instanceof Property && !$multiplicand instanceof Property) {
            return $multiplier * $multiplicand;
        }

        if ($multiplier instanceof Property && !$multiplicand instanceof Property) {
            return new ($multiplier::class)($multiplier->getValue() * $multiplicand, $multiplier->getUnit());
        }

        if (!$multiplier instanceof Property && $multiplicand instanceof Property) {
            return new ($multiplicand::class)($multiplicand->getValue() * $multiplier, $multiplicand->getUnit());
        }

        self::compileEquations();

        foreach (self::$equations as $product => $equations) {
            if ($product === $multiplier::getQuantityClassName() ||
                $product === $multiplicand::getQuantityClassName()) {
                continue;
            }

            foreach ($equations as $equation) {
                if (!str_contains($equation, " * ")) {
                    continue;
                }

                $parsed = preg_replace(
                    "/\(\%{$multiplier::getQuantityClassName()::getDimensionSymbol()}\%\)/",
                    "{$multiplier->getValue()}",
                    $equation,
                    1
                );

                if ($parsed !== $equation) {
                    $equation = $parsed;
                }

                $parsed = preg_replace(
                    "/\(\%{$multiplicand::getQuantityClassName()::getDimensionSymbol()}\%\)/",
                    "{$multiplicand->getValue()}",
                    $equation,
                    1
                );

                if ($parsed === $equation) {
                    continue;
                }

                $unit     = $product::getDefaultUnit();
                $property = $product::getDefaultProperty();

                if (isset(self::$productResolvers[$product])) {
                    $newProperty = self::$productResolvers[$product]($multiplier, $multiplicand);

                    if (!$newProperty instanceof Property || $newProperty::getQuantityClassName() !== $product) {
                        throw new \TypeError();
                    }

                    return $newProperty;
                }

                $multiplier   = $multiplier->convertToUnit($multiplier::getQuantityClassName()::getDefaultUnit());
                $multiplicand = $multiplicand->convertToUnit($multiplicand::getQuantityClassName()::getDefaultUnit());

                return new ($property)($multiplier->getValue() * $multiplicand->getValue(), $unit::get());
            }
        }

        throw new \ValueError();
    }

    protected static function compileEquations(bool $force = false): void
    {
        if ($force === false && !empty(self::$equations)) {
            return;
        }

        foreach (self::$quantities as $quantity) {
            if (in_array(DerivedQuantity::class, class_implements($quantity) ?: [])) {
                foreach ($quantity::getEquations() as $equation) {
                    self::compileEquation($equation, $quantity);
                }
            }
        }
    }

    protected static function compileEquation(string $equation, string $quantity): void
    {
        $equations     = [$quantity => [$equation]];
        $equationParts = explode(" ", $equation);
        $replacement   = [$quantity => "(%" . $quantity::getDimensionSymbol() . "%)"];

        foreach ($equationParts as $equationPart) {
            if (class_exists($equationPart) && is_subclass_of($equationPart, Quantity::class)) {
                $replacement[$equationPart] = "(%" . $equationPart::getDimensionSymbol() . "%)";
            }
        }

        if (count($equationParts) === 3) {
            switch ($equationParts[1]) {
                case "*":
                    $equations[$equationParts[0]][] = $quantity . " / " . $equationParts[2];
                    $equations[$equationParts[2]][] = $quantity . " / " . $equationParts[0];
                break;

                default:
                case "/":
                    $equations[$equationParts[0]][] = $quantity . " * " . $equationParts[2];
                    $equations[$equationParts[0]][] = $equationParts[2] . " * " . $quantity;
                    $equations[$equationParts[2]][] = $equationParts[0] . " / " . $quantity;
                break;
            }
        }

        foreach ($equations as $quantity => $innerEquations) {
            foreach ($innerEquations as $equation) {
                $equation = str_replace(array_keys($replacement), array_values($replacement), $equation);
                self::$equations[$quantity][] = $equation;
            }
        }
    }
}