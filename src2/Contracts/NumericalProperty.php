<?php

declare(strict_types = 1);

namespace MiBo\Properties\Contracts;

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
 */
interface NumericalProperty extends Property
{
    public function add(int|float|NumericalProperty $value): static;

    public function subtract(int|float|NumericalProperty $value): static;

    public function multiply(int|float|NumericalProperty $value): NumericalProperty;

    public function divide(int|float|NumericalProperty $value): NumericalProperty;

    public function round(int $precision = 0, int $mode = PHP_ROUND_HALF_UP): static;

    public function ceil(): static;

    public function floor(): static;
}
