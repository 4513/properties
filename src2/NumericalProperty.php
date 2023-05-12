<?php

declare(strict_types = 1);

namespace MiBo\Properties;

use MiBo\Properties\Calculators\Math;
use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Contracts\NumericalProperty as ContractNumericalProperty;

/**
 * Class NumericalProperty
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @extends \MiBo\Properties\Property<\MiBo\Properties\Contracts\NumericalUnit>
 */
abstract class NumericalProperty extends Property implements ContractNumericalProperty
{
    /**
     * @inheritDoc
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty|float|int $value
     *
     * @return static
     */
    public function add(ContractNumericalProperty|float|int $value): static
    {
        return $this->setValue(PropertyCalc::add($this, $value));
    }

    /**
     * @inheritDoc
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty|float|int $value
     *
     * @return static
     */
    public function subtract(ContractNumericalProperty|float|int $value): static
    {
        return $this->setValue(PropertyCalc::subtract($this, $value));
    }

    /**
     * @inheritDoc
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty|float|int $value
     *
     * @return ($value is int|float ? static : \MiBo\Properties\Contracts\NumericalProperty)
     */
    public function multiply(ContractNumericalProperty|float|int $value): ContractNumericalProperty
    {
        if ($value instanceof ContractNumericalProperty) {
            return PropertyCalc::multiply($this, $value);
        }

        return $this->setValue(Math::product($this->getValue(), $value));
    }

    /**
     * @inheritDoc
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty|float|int $value
     *
     * @return ($value is int|float ? static : \MiBo\Properties\Contracts\NumericalProperty)
     */
    public function divide(ContractNumericalProperty|float|int $value): ContractNumericalProperty
    {
        if ($value instanceof ContractNumericalProperty) {
            return PropertyCalc::divide($this, $value);
        }

        return $this->setValue(Math::ratio($this->getValue(), $value));
    }

    /**
     * @inheritDoc
     */
    public function round(int $precision = 0, int $mode = PHP_ROUND_HALF_UP): static
    {
        return $this->setValue(Math::round($this->getValue(), $precision, $mode));
    }

    /**
     * @inheritDoc
     */
    public function ceil(): static
    {
        return $this->setValue(Math::ceil($this->getValue()));
    }

    /**
     * @inheritDoc
     */
    public function floor(): static
    {
        return $this->setValue(Math::floor($this->getValue()));
    }
}
