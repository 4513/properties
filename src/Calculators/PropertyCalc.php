<?php

declare(strict_types=1);

namespace MiBo\Properties\Calculators;

use CompileError;
use InvalidArgumentException;
use MiBo\Properties\Contracts\DerivedQuantity;
use MiBo\Properties\Contracts\NumericalProperty;
use MiBo\Properties\Contracts\Quantity;
use MiBo\Properties\Exceptions\DivisionByZeroException;
use MiBo\Properties\Exceptions\IncompatiblePropertyError;
use MiBo\Properties\Quantities\AmountOfSubstance;
use MiBo\Properties\Quantities\Area;
use MiBo\Properties\Quantities\ElectricCurrent;
use MiBo\Properties\Quantities\Length;
use MiBo\Properties\Quantities\LuminousIntensity;
use MiBo\Properties\Quantities\Mass;
use MiBo\Properties\Quantities\Pure;
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
 * @since 0.1
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
        LuminousIntensity::class,
        Pure::class,
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

    /**
     * Adds two or more quantities using addition.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $addend First addend.
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$addends Other addends.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Sum of all addends.
     */
    public static function add(NumericalProperty $addend, NumericalProperty ...$addends): NumericalProperty
    {
        return self::merge(true, $addend, ...$addends);
    }

    /**
     * Subtracts two or more quantities using subtraction.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $minuend Minuend.
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$subtrahends Subtrahends.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Difference of all subtrahends from minuend.
     */
    public static function subtract(NumericalProperty $minuend, NumericalProperty ...$subtrahends): NumericalProperty
    {
        return self::merge(false, $minuend, ...$subtrahends);
    }

    /**
     * Multiplies two or more quantities using multiplication.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $multiplier First multiplier.
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$multiplicands Other multiplicands.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Product of all multiplicands.
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
     * Divides two or more quantities using division.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $dividend Dividend.
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$divisors Divisors.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Quotient of all divisors from dividend.
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
     * Merges two quantities using multiplication.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $multiplier First multiplier.
     * @param \MiBo\Properties\Contracts\NumericalProperty $multiplicand Other multiplicand.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Product of multiplier and multiplicand.
     */
    protected static function multiplySingle(
        NumericalProperty $multiplier,
        NumericalProperty $multiplicand
    ): NumericalProperty
    {
        return self::mergeQuantities($multiplier, $multiplicand);
    }

    /**
     * Merges two quantities using multiplication.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $dividend Dividend.
     * @param \MiBo\Properties\Contracts\NumericalProperty $divisor Divisor.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Product of dividend and divisor.
     */
    protected static function divideSingle(
        NumericalProperty $dividend,
        NumericalProperty $divisor
    ): NumericalProperty
    {
        return self::mergeQuantities($dividend, $divisor, false);
    }

    /**
     * Validates that the divisor is not zero.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $divisor Divisor.
     *
     * @return void
     */
    protected static function checkDivisor(NumericalProperty $divisor): void
    {
        if ($divisor->getNumericalValue()->isAlmostZero()
            || $divisor->getValue() === 0
            || $divisor->getValue() === 0.0
        ) {
            throw new DivisionByZeroException();
        }
    }

    /**
     * Merges two or more quantities using addition or subtraction.
     *
     * @param bool $add Whether to add or subtract (true = add, false = subtract).
     * @param \MiBo\Properties\Contracts\NumericalProperty ...$properties Properties to merge.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Merged property.
     */
    protected static function merge(bool $add = true, NumericalProperty ...$properties): NumericalProperty
    {
        $quantity = null;
        $mainProp = null;

        if (count($properties) === 0) {
            throw new InvalidArgumentException('Cannot merge zero quantities.');
        }

        foreach ($properties as $property) {
            if ($quantity === null) {
                $quantity = $property::getQuantityClassName();
                $property->getNumericalValue()->multiply(1, $property->getUnit()->getMultiplier());
                $mainProp = $property;

                continue;
            }

            if ($property::getQuantityClassName() !== $quantity) {
                throw new IncompatiblePropertyError('Cannot merge different quantities.');
            }

            if ($add) {
                $mainProp?->getNumericalValue()
                    ->add($property->getNumericalValue(), $property->getUnit()->getMultiplier());
            } else {
                $mainProp?->getNumericalValue()
                    ->subtract($property->getNumericalValue(), $property->getUnit()->getMultiplier());
            }
        }

        /** @var \MiBo\Properties\Contracts\NumericalProperty */
        return $mainProp;
    }

    /**
     * Merges two quantities using multiplication or division.
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty $first First property.
     * @param \MiBo\Properties\Contracts\NumericalProperty $second Second property.
     * @param bool $toProduct Whether to merge to product or quotient (true = product, false = quotient).
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Merged property.
     */
    protected static function mergeQuantities(
        NumericalProperty $first,
        NumericalProperty $second,
        bool $toProduct = true
    ): NumericalProperty
    {
        if ($toProduct === false) {
            self::checkDivisor($second);
        }

        $first  = clone $first;
        $second = clone $second;

        self::compileEquations();

        if ($second instanceof \MiBo\Properties\Pure) {
            return $toProduct ?
                $first->multiply($second->getValue()) :
                $first->divide($second->getValue());
        }

        if (!$toProduct && $first->getQuantity()::class === $second->getQuantity()::class) {
            return new (Pure::getDefaultProperty())(
                $first->getNumericalValue()->divide($second->convertToUnit($first->getUnit())->getValue())
            );
        }

        /**
         * @var \MiBo\Properties\Contracts\Quantity $product
         * @var string[] $equations
         */
        foreach (self::$equations as $product => $equations) {
            // @phpstan-ignore-next-line class vs class-string
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
                    // @phpstan-ignore-next-line class-string
                    throw new CompileError("An error occurred while compiling {$product} equation.");
                }

                /** @var \MiBo\Properties\Contracts\Quantity $firstQuantity */
                $firstQuantity = $first::getQuantityClassName();

                $parsed = preg_replace(
                    "/\(\%{$firstQuantity::getDimensionSymbol()}\%\)/",
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
                    "{$second->getValue()}",
                    $equation,
                    1
                );

                if ($parsed === $equation) {
                    continue;
                }

                $unit     = $product::getDefaultUnit();
                $property = $product::getDefaultProperty();

                /** @var class-string<\MiBo\Properties\Contracts\Quantity> $product */
                $product = $product;

                if (isset(self::$productResolvers[$product])) {
                    /** @var \MiBo\Properties\Contracts\NumericalProperty $first */
                    /** @var \MiBo\Properties\Contracts\NumericalProperty $second */
                    /** @var \MiBo\Properties\Contracts\NumericalProperty $newProperty */
                    $newProperty = self::$productResolvers[$product]($first, $second);

                    if (!$newProperty instanceof NumericalProperty
                        || $newProperty::getQuantityClassName() !== $product
                    ) {
                        throw new TypeError("Product resolver for {$product} must return a {$product} property!");
                    }

                    return $newProperty;
                }

                /** @var \MiBo\Properties\Contracts\NumericalUnit $firstDefaultUnit */
                $firstDefaultUnit = $firstQuantity::getDefaultUnit();
                /** @var \MiBo\Properties\Contracts\NumericalUnit $secondDefaultUnit */
                $secondDefaultUnit = $secondQuantity::getDefaultUnit();

                $first  = $first->convertToUnit($firstDefaultUnit);
                $second = $second->convertToUnit($secondDefaultUnit);

                $value = $first->getNumericalValue();

                return $toProduct ?
                    new ($property)($value->multiply($second->getNumericalValue()), $unit::get()) :
                    new ($property)($value->divide($second->getNumericalValue()), $unit::get());
            }
        }

        throw new ValueError(
            "No resolver found for merging {$first::getQuantityClassName()} and {$second::getQuantityClassName()}!"
        );
    }

    /**
     * Compiles equations for derived quantities.
     *
     * @param bool $force Whether to force recompilation.
     *
     * @return void
     */
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
     * Compiles an equation for a derived quantity.
     *
     * @param string $equation Equation.
     * @param class-string<\MiBo\Properties\Contracts\Quantity> $quantity Quantity.
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
