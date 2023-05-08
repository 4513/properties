<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

use Error;
use MiBo\Properties\Quantities\NoQuantity;
use Stringable;

/**
 * Class Unit
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @template TQuantity of \MiBo\Properties\Contracts\Quantity
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
abstract class Unit implements Stringable, UsedInSystem
{
    use HasSymbol,
        HasName,
        HasMultiplier;

    /** @var string */
    protected string $code;

    /** @var static|null */
    protected static ?Unit $instance = null;

    /** @var class-string<TQuantity> */
    protected const QUANTITY = NoQuantity::class;

    /**
     * @see \MiBo\Properties\Contracts\Unit::get
     */
    final protected function __construct() {}

    /**
     * Singleton's constructor.
     *
     * @return static
     */
    public static function get(): static
    {
        if (static::class === Unit::class) {
            throw new Error("Cannot call static method 'get' on abstract class " . Unit::class . "!");
        }

        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Returns the unit's code (e.g. 'm' for meter, or 'EUR' for the euro currency).
     *
     * @return string
     */
    public function getCode(): string
    {
        if (!isset($this->code)) {
            return $this->getSymbol();
        }

        return $this->code;
    }

    /**
     * Returns string-able unit.
     *
     * @return string
     */
    final public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Returns string-able unit.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->getName();
    }

    /**
     * @inheritdoc
     */
    public function isImperial(): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function isSI(): bool
    {
        return false;
    }

    public function isDimensional(): bool
    {
        return false;
    }

    /**
     * @return class-string<TQuantity>
     */
    public static function getQuantity(): string
    {
        return static::QUANTITY;
    }
}