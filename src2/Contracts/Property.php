<?php

declare(strict_types = 1);

namespace MiBo\Properties\Contracts;

/**
 * Interface Property
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface Property
{
    public function getUnit(): Unit;

    public static function getQuantityClassName(): string;

    public function getQuantity();

    public function getValue();

    public function getBaseValue();

    public function convertToUnit(Unit $unit): Property;
}
