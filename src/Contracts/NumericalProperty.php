<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

use MiBo\Properties\Value;

/**
 * Interface NumericalProperty
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @phpcs:ignore
 * @extends \MiBo\Properties\Contracts\Property<\MiBo\Properties\Contracts\NumericalUnit, int|float|\MiBo\Properties\Value>
 */
interface NumericalProperty extends Property
{
    /**
     * Add value to property.
     *
     * @param int|float|\MiBo\Properties\Contracts\NumericalProperty $value Value to add.
     *
     * @return static Property with added value.
     */
    public function add(int|float|NumericalProperty $value): static;

    /**
     * Subtract value from property.
     *
     * @param int|float|\MiBo\Properties\Contracts\NumericalProperty $value Value to subtract.
     *
     * @return static Property with subtracted value.
     */
    public function subtract(int|float|NumericalProperty $value): static;

    /**
     * Multiply property by value.
     *
     * @param int|float|\MiBo\Properties\Contracts\NumericalProperty $value Value to multiply by.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Property with multiplied value.
     */
    public function multiply(int|float|NumericalProperty $value): NumericalProperty;

    /**
     * Divide property by value.
     *
     * @param int|float|\MiBo\Properties\Contracts\NumericalProperty $value Value to divide by.
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty Property with divided value.
     */
    public function divide(int|float|NumericalProperty $value): NumericalProperty;

    /**
     * @inheritDoc
     *
     * @return int|float
     */
    public function getValue(): int|float;

    /**
     * @inheritDoc
     *
     * @param \MiBo\Properties\Contracts\NumericalUnit $unit Unit to convert to.
     *
     * @return static Property with converted value.
     */
    public function convertToUnit(Unit $unit): NumericalProperty;

    /**
     * Get numerical value.
     *
     * @return \MiBo\Properties\Value Numerical value.
     */
    public function getNumericalValue(): Value;
}
