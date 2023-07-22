<?php

declare(strict_types=1);

namespace MiBo\Properties;

use MiBo\Properties\Contracts\NumericalProperty as ContractNumericalProperty;
use MiBo\Properties\Contracts\Unit;
use MiBo\Properties\Units\PerUnit\PerNotSpecified;

/**
 * Class PerUnit
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PerUnit extends NumericalProperty
{
    protected ContractNumericalProperty $dividend;

    protected ContractNumericalProperty $divisor;

    /**
     * @param \MiBo\Properties\Contracts\NumericalProperty $dividend
     * @param \MiBo\Properties\Contracts\NumericalProperty $divisor
     */
    public function __construct(ContractNumericalProperty $dividend, ContractNumericalProperty $divisor)
    {
        $this->dividend = $dividend;
        $this->divisor  = $divisor;
        $value          = $dividend->getValue() / $divisor->getValue();

        parent::__construct($value, PerNotSpecified::get($dividend->getUnit(), $divisor->getUnit()));
    }

    /**
     * @inheritDoc
     */
    public function getNumericalValue(): Value
    {
        return parent::getNumericalValue()
            ->multiply(0)
            ->add($this->dividend->getValue())
            ->divide($this->divisor->getValue())
            ->divide($this->getUnit()->getDivisorMultiplier());
    }

    /**
     * Changes the divisor multiplier.
     *
     * @param int|float $amount
     *
     * @return $this
     */
    public function perAmount(int|float $amount = 1): static
    {
        $this->getUnit()->setDivisorMultiplier($amount);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @return \MiBo\Properties\Units\PerUnit\PerNotSpecified
     */
    public function getUnit(): Unit
    {
        /** @var \MiBo\Properties\Units\PerUnit\PerNotSpecified */
        return parent::getUnit();
    }

    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\PerUnit::class;
    }
}
