<?php

declare(strict_types = 1);

namespace MiBo\Properties\Calculators;

use CompileError;
use InvalidArgumentException;
use MiBo\Properties\Contracts\DerivedQuantity;
use MiBo\Properties\Contracts\NumericalProperty;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Quantities\AmountOfSubstance;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\ElectricCurrent;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Quantities\Mass;
use MiBo\Properties\Quantities\ThermodynamicTemperature;
use MiBo\Properties\Quantities\Time;
use MiBo\Properties\Quantities\Volume;
use TypeError;
use ValueError;

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
    /**
     * @var class-string<\MiBo\Properties\Contracts\Quantity>[]
     */
    public static array $quantities = [
        Length::class,
        Area::class,
        Volume::class,
        Time::class,
        AmountOfSubstance::class,
        Mass::class,
        ElectricCurrent::class,
        ThermodynamicTemperature::class,
    ];

    /**
     * @var array<class-string<\MiBo\Properties\Contracts\Quantity>, string[]>
     */
    protected static array $equations = [];

    /**
     * @phpcs:ignore Generic.Files.LineLength.TooLong
     * @var array<class-string<\MiBo\Properties\Contracts\Quantity>, \Closure(\MiBo\Properties\Contracts\NumericalProperty,\MiBo\Properties\Contracts\NumericalProperty): ?\MiBo\Properties\Contracts\NumericalProperty> $productResolvers
     */
    public static array $productResolvers = [];

    protected static function merge(bool $add = true, NumericalProperty ...$properties): NumericalProperty
    {
        $quantity = null;
        $mainProp = null;

        foreach ($properties as $property) {
            if ($quantity === null) {
                $quantity = $property::getQuantityClassName();
                $property->getNumericalValue()->multiply(1, $property->getUnit()->getMultiplier());
                $mainProp = $property;

                continue;
            }

            if ($property::getQuantityClassName() !== $quantity) {
                throw new InvalidArgumentException('Cannot merge different quantities.');
            }

            if ($add) {
                $mainProp->getNumericalValue()
                    ->add($property->getNumericalValue(), $property->getUnit()->getMultiplier());
            } else {
                $mainProp->getNumericalValue()
                    ->subtract($property->getNumericalValue(), $property->getUnit()->getMultiplier());
            }
        }

        return $mainProp;
    }

    /**
     * @param \MiBo\Properties\Contracts\NumericalProperty $addend
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$addends
     *
     * @return \MiBo\Properties\NumericalProperty
     */
    public static function add(NumericalProperty $addend, NumericalProperty ...$addends): NumericalProperty
    {
        return self::merge(true, $addend, ...$addends);
    }

    /**
     * @param \MiBo\Properties\Contracts\NumericalProperty $minuend
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$subtrahends
     *
     * @return \MiBo\Properties\NumericalProperty
     */
    public static function subtract(NumericalProperty $minuend, NumericalProperty ...$subtrahends): NumericalProperty
    {
        return self::merge(false, $minuend, ...$subtrahends);
    }

    /**
     * @param \MiBo\Properties\Contracts\NumericalProperty $multiplier
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$multiplicands
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty
     */
    public static function multiply(
        NumericalProperty $multiplier,
        NumericalProperty ...$multiplicands
    ): NumericalProperty
    {
        foreach ($multiplicands as $multiplicand) {
            $multiplier = self::multiplySingle($multiplier, $multiplicand);
        }

        return $multiplier;
    }

    /**
     * @param \MiBo\Properties\Contracts\NumericalProperty $dividend
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$divisors
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty
     */
    public static function divide(
        NumericalProperty $dividend,
        NumericalProperty ...$divisors
    ): NumericalProperty
    {
        foreach ($divisors as $divisor) {
            $dividend = self::divideSingle($dividend, $divisor);
        }

        return $dividend;
    }

    /**
     * @param \MiBo\Properties\Contracts\NumericalProperty $dividend
     * @param \MiBo\Properties\Contracts\NumericalProperty $divisor
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty
     */
    protected static function divideSingle(
        NumericalProperty $dividend,
        NumericalProperty $divisor
    ): NumericalProperty
    {
        self::checkDivisor($divisor);

        return self::mergeQuantities($dividend, $divisor, false);
    }

    protected static function checkDivisor(int|float|NumericalProperty $divisor): void
    {
        if ($divisor instanceof NumericalProperty && ($divisor->getValue() === 0 || $divisor->getValue() === 0.0)) {
            throw new InvalidArgumentException('Cannot divide by zero.');
        }

        if (!$divisor instanceof NumericalProperty && ($divisor === 0 || $divisor === 0.0)) {
            throw new InvalidArgumentException('Cannot divide by zero.');
        }
    }

    /**
     * @param \MiBo\Properties\Contracts\NumericalProperty $multiplier
     * @param \MiBo\Properties\Contracts\NumericalProperty $multiplicand
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty
     */
    protected static function multiplySingle(
        NumericalProperty $multiplier,
        NumericalProperty $multiplicand
    ): NumericalProperty
    {
        return self::mergeQuantities($multiplier, $multiplicand);
    }

    protected static function mergeQuantities(
        NumericalProperty $first,
        NumericalProperty $second,
        bool $toProduct = true
    ): NumericalProperty
    {
        if ($toProduct === false) {
            self::checkDivisor($second);
        }

        self::compileEquations();

        /**
         * @var \MiBo\Properties\Contracts\Quantity $product
         * @var string[] $equations
         */
        foreach (self::$equations as $product => $equations) {
            if ($product === $first::getQuantityClassName()) {
                continue;
            }

            foreach ($equations as $equation) {
                if ($toProduct && !str_contains($equation, " * ")) {
                    continue;
                }

                if (!$toProduct && !str_contains($equation, " / ")) {
                    continue;
                }

                $firstHalf = preg_replace("/(\/.*)/", "", $equation);

                if ($firstHalf === null) {
                    throw new CompileError();
                }

                /** @var \MiBo\Properties\Contracts\Quantity $firstQuantity */
                $firstQuantity = $first::getQuantityClassName();

                $parsed = preg_replace(
                    "/\(\%{$firstQuantity::getDimensionSymbol()}\%\)/",
                    // @phpstan-ignore-next-line
                    "{$first->getValue()}",
                    $firstHalf,
                    1
                );

                if ($parsed === $firstHalf) {
                    continue;
                }

                /** @var \MiBo\Properties\Contracts\Quantity $secondQuantity */
                $secondQuantity = $second::getQuantityClassName();

                $parsed = preg_replace(
                    "/\(\%{$secondQuantity::getDimensionSymbol()}\%\)/",
                    // @phpstan-ignore-next-line
                    "{$second->getValue()}",
                    $equation,
                    1
                );

                if ($parsed === $equation) {
                    continue;
                }

                $unit     = $product::getDefaultUnit();
                $property = $product::getDefaultProperty();

                if (isset(self::$productResolvers[$product])) {
                    /** @var \MiBo\Properties\Contracts\NumericalProperty $first */
                    /** @var \MiBo\Properties\Contracts\NumericalProperty $second */
                    /** @var \MiBo\Properties\Contracts\NumericalProperty $newProperty */
                    $newProperty = self::$productResolvers[$product]($first, $second);

                    if (!$newProperty instanceof NumericalProperty
                        || $newProperty::getQuantityClassName() !== $product
                    ) {
                        throw new TypeError();
                    }

                    return $newProperty;
                }

                $first  = $first->convertToUnit($firstQuantity::getDefaultUnit());
                $second = $second->convertToUnit($secondQuantity::getDefaultUnit());

                $value = $first->getNumericalValue();

                return $toProduct ?
                    new ($property)($value->multiply($second->getNumericalValue()), $unit::get()) :
                    new ($property)($value->divide($second->getNumericalValue()), $unit::get());
            }
        }

        throw new ValueError();
    }

    protected static function compileEquations(bool $force = false): void
    {
        if ($force === false && !empty(self::$equations)) {
            return;
        }

        foreach (self::$quantities as $quantity) {
            if (in_array(DerivedQuantity::class, class_implements($quantity) ?: [])) {
                /** @phpstan-ignore-next-line */
                foreach ($quantity::getEquations() as $equation) {
                    self::compileEquation($equation, $quantity);
                }
            }
        }
    }

    /**
     * @param string $equation
     * @param class-string<\MiBo\Properties\Contracts\Quantity> $quantity
     *
     * @return void
     */
    protected static function compileEquation(string $equation, string $quantity): void
    {
        /** @var array<class-string<\MiBo\Properties\Contracts\Quantity>, string[]> $equations */
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

        /**
         * @var class-string<\MiBo\Properties\Contracts\Quantity> $quantity
         * @var string[] $innerEquations
         */
        foreach ($equations as $quantity => $innerEquations) {
            foreach ($innerEquations as $equation) {
                $equation = str_replace(array_keys($replacement), array_values($replacement), $equation);
                self::$equations[$quantity][] = $equation;
            }
        }
    }
}
