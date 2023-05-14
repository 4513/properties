<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Calculators\UnitConvertor;
use MiBo\Properties\Contracts\NumericalProperty as ContractNumericalProperty;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\Unit;
use ValueError;

/**
 * Class NumericalProperty
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @extends \MiBo\Properties\Property<\MiBo\Properties\Contracts\NumericalUnit>
 */
abstract class NumericalProperty extends Property implements ContractNumericalProperty
{
    private Value $numericalValue;

    public function __construct(float|int|Value $value, Unit $unit)
    {
        $this->numericalValue = $value instanceof Value ? $value : new Value($value);

        parent::__construct($this->numericalValue->getValue(), $unit);
    }

    /**
     * @inheritDoc
     */
    public function getValue(): int|float
    {
        return $this->numericalValue->getValue();
    }

    /**
     * @inheritDoc
     */
    public function getBaseValue(): int|float
    {
        return $this->numericalValue->getValue($this->getUnit()->getMultiplier());
    }

    /**
     * @inheritDoc
     */
    public function convertToUnit(Unit $unit): NumericalProperty
    {
        if (!$unit instanceof NumericalUnit) {
            throw new ValueError();
        }

        $this->numericalValue = UnitConvertor::convert($this, $unit);
        $this->unit           = $unit;

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param \MiBo\Properties\Contracts\NumericalProperty|float|int $value
     *
     * @return static
     */
    public function add(ContractNumericalProperty|float|int $value): static
    {
        if ($value instanceof ContractNumericalProperty) {
            return PropertyCalc::add($this, $value);
        }

        $this->numericalValue->add($value);

        return $this;
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
        if ($value instanceof ContractNumericalProperty) {
            return PropertyCalc::subtract($this, $value);
        }

        $this->numericalValue->subtract($value);

        return $this;
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

        $this->numericalValue->multiply($value);

        return $this;
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

        $this->numericalValue->divide($value);

        return $this;
    }

    /**
     * @return \MiBo\Properties\Value
     */
    public function getNumericalValue(): Value
    {
        return $this->numericalValue;
    }

    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return [
            "value" => $this->getValue(),
            "unit"  => $this->getUnit(),
        ];
    }

    /**
     * Clones the property.
     *
     * @return void
     */
    public function __clone(): void
    {
        $this->numericalValue = clone $this->numericalValue;
    }
}
