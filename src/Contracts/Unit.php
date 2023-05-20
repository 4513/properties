<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

use Stringable;

/**
 * Interface Unit
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
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

    /**
     * Some units are accepted for use with SI.
     *
     * @return bool Whether the Unit is accepted for use with SI.
     */
    public function acceptedForUseWithSI(): bool;

    /**
     * Some units are defined in the Imperial System.
     *
     * @return bool Whether the Unit is defined as Imperial.
     */
    public function isImperial(): bool;

    /**
     * Some units are defined in the Metric System.
     *
     * @return bool Whether the Unit is defined as Metric.
     */
    public function isMetric(): bool;

    /**
     * Some units are defined in the Astronomical System.
     *
     * @return bool Whether the Unit is defined as Astronomical.
     */
    public function isAstronomical(): bool;

    /**
     * Some units are defined in the US Customary System.
     *
     * @return bool Whether the Unit is defined as US Customary.
     */
    public function isUSCustomary(): bool;

    /**
     * Some units are defined in the English System.
     *
     * @return bool Whether the Unit is defined as English.
     */
    public function isEnglish(): bool;

    /**
     * Creates a new instance of the Unit.
     *
     * @return static New instance of the Unit.
     */
    public static function get();

    /**
     * Returns the symbol of the Unit.
     *
     * @return string Symbol of the Unit.
     */
    public function getSymbol(): string;

    /**
     * Returns the name of the Unit.
     *
     * @return string Name of the Unit.
     */
    public function toString(): string;

    /**
     * Returns the name of the Unit.
     *
     * @return string Name of the Unit.
     */
    public function getName(): string;

    /**
     * Returns the quantity for the Unit.
     *
     * @return string Name of the Unit.
     */
    public static function getQuantityClassName(): string;

    /**
     * Compares the Unit with another Unit.
     *
     * @param \MiBo\Properties\Contracts\Unit $unit Unit to compare.
     *
     * @return bool Whether the Unit is the same.
     */
    public function is(Unit $unit): bool;
}
