<?php

declare(strict_types = 1);

namespace MiBo\Properties\Traits;

/**
 * Trait UnitHelper
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait UnitHelper
{
    /** @var array<class-string<static>, static> */
    protected static array $instances = [];

    /**
     * @inheritDoc
     */
    public static function get(): static
    {
        if (!key_exists(static::class, self::$instances)) {
            self::$instances[static::class] = new static();
        }

        return static::$instances[static::class];
    }

    /**
     * @inheritDoc
     */
    public function getMultiplier(): int|float
    {
        return $this->multiplier ?? 1;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @inheritDoc
     */
    public function toString(): string
    {
        return $this->getName();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }
}
