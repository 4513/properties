<?php

declare(strict_types = 1);

namespace MiBo\Properties\Contracts;

use Stringable;

/**
 * Interface Unit
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface Unit extends Stringable
{
    /**
     * Some units are defined in the International System of Units (SI).
     *
     * @return bool Whether the Unit is defined in SI.
     */
    public function isSI(): bool;

    public function acceptedForUseWithSI(): bool;

    /**
     * Some units are defined in the Imperial System.
     *
     * @return bool Whether the Unit is defined as Imperial.
     */
    public function isImperial(): bool;

    public function isMetric(): bool;

    public function isAstronomical(): bool;

    public function isUSCustomary(): bool;

    public function isEnglish(): bool;

    /**
     * Creates a new instance of the Unit.
     *
     * @return static New instance of the Unit.
     */
    public static function get(): static;

    public function getSymbol(): string;

    public function toString(): string;

    public function getName(): string;

    public static function getQuantityClassName(): string;
}
