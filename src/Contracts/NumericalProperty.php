<?php

declare(strict_types = 1);

namespace MiBo\Properties\Contracts;

use MiBo\Properties\Value;

/**
 * Interface NumericalProperty
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @extends \MiBo\Properties\Contracts\Property<\MiBo\Properties\Contracts\NumericalUnit>
 */
interface NumericalProperty extends Property
{
    /**
     * @param int|float|\MiBo\Properties\Contracts\NumericalProperty $value
     *
     * @return static
     */
    public function add(int|float|NumericalProperty $value): static;

    /**
     * @param int|float|\MiBo\Properties\Contracts\NumericalProperty $value
     *
     * @return static
     */
    public function subtract(int|float|NumericalProperty $value): static;

    /**
     * @param int|float|\MiBo\Properties\Contracts\NumericalProperty $value
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty
     */
    public function multiply(int|float|NumericalProperty $value): NumericalProperty;

    /**
     * @param int|float|\MiBo\Properties\Contracts\NumericalProperty $value
     *
     * @return \MiBo\Properties\Contracts\NumericalProperty
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
     * @return static
     */
    public function convertToUnit(Unit $unit): Property;

    /**
     * @return \MiBo\Properties\Value
     */
    public function getNumericalValue(): Value;
}
