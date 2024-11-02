<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Calculators\UnitConvertor;
use MiBo\Properties\Contracts\NumericalComparableProperty;
use MiBo\Properties\Contracts\NumericalProperty as ContractNumericalProperty;
use MiBo\Properties\Contracts\NumericalUnit;
use MiBo\Properties\Contracts\PrinterAwareInterface;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Exceptions\IncompatiblePropertyError;
use MiBo\Properties\Traits\ComparesNumericalValueTrait;
use MiBo\Properties\Traits\PrinterAwareTrait;

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
 * @extends \MiBo\Properties\Property<\MiBo\Properties\Contracts\NumericalUnit, int|float>
 *
 * @phpstan-ignore-next-line
 */
abstract class NumericalProperty extends Property implements
    ContractNumericalProperty,
    PrinterAwareInterface,
    NumericalComparableProperty
{
    use PrinterAwareTrait;
    use ComparesNumericalValueTrait;

    private Value $numericalValue;

    /**
     * @param float|int|\MiBo\Properties\Value $value
     * @param \MiBo\Properties\Contracts\Unit $unit
     */
    public function __construct(float|int|Value $value, Unit $unit)
    {
        $this->numericalValue = $value instanceof Value ? $value : new Value($value);

        if (!$unit instanceof NumericalUnit) {
            throw new IncompatiblePropertyError("Property's unit must be compatible with the property!");
        }

        parent::__construct($this->numericalValue->getValue(), $unit);
    }

    /**
     * @inheritDoc
     */
    public function getValue(): int|float
    {
        return $this->getNumericalValue()->getValue();
    }

    /**
     * @inheritDoc
     */
    public function getBaseValue(): int|float
    {
        return $this->getNumericalValue()->getValue($this->getUnit()->getMultiplier());
    }

    /**
     * @inheritDoc
     */
    public function convertToUnit(Unit $unit): NumericalProperty
    {
        if (!$unit instanceof NumericalUnit) {
            throw new IncompatiblePropertyError("Property's unit must be compatible with the property!");
        }

        if ($unit->is($this->unit)) {
            return $this;
        }

        foreach ($this->convertedValues as $key => $convertedValue) {
            if ($convertedValue['unit']->is($this->unit)) {
                unset($this->convertedValues[$key]);

                break;
            }
        }

        $clone = clone $this;

        $this->convertedValues[] = [
            'value' => $clone,
            'unit'  => $clone->unit,
        ];

        foreach ($this->convertedValues as $convertedValue) {
            if ($convertedValue['unit']->is($unit)) {
                /** @phpstan-var \MiBo\Properties\NumericalProperty */
                return $convertedValue['value'];
            }
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
        $this->convertedValues = [];

        if ($value instanceof ContractNumericalProperty) {
            /** @var static */
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
        $this->convertedValues = [];

        if ($value instanceof ContractNumericalProperty) {
            /** @var static */
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
            "unit"  => [
                "name"   => $this->getUnit()->getName(),
                "symbol" => $this->getUnit()->getSymbol(),
                "class"  => $this->getUnit(),
            ],
        ];
    }

    /**
     * Clones the property.
     *
     * @return void
     */
    public function __clone(): void
    {
        $this->numericalValue  = clone $this->numericalValue;
        $this->convertedValues = [];
    }
}
