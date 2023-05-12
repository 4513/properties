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
     * @param int $precision
     * @param int<1, 4> $mode
     *
     * @return static
     */
    public function round(int $precision = 0, int $mode = PHP_ROUND_HALF_UP): static;

    /**
     * @return static
     */
    public function ceil(): static;

    /**
     * @return static
     */
    public function floor(): static;
}
