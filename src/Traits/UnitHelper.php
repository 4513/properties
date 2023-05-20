<?php

declare(strict_types=1);

namespace MiBo\Properties\Traits;

use MiBo\Properties\Contracts\Unit;

/**
 * Trait UnitHelper
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
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
            /** @phpstan-ignore-next-line static construct */
            self::$instances[static::class] = new static();
        }

        return self::$instances[static::class];
    }

    /**
     * @inheritDoc
     */
    public function getMultiplier(): int
    {
        $multiplier = $this->multiplier ?? 0;

        /** @phpstan-ignore-next-line */
        if (method_exists($this, "getMultiplierPrefix")) {
            $multiplier += $this->getMultiplierPrefix();
        }

        return $multiplier;
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
        $name = $this->name ?? "";

        /** @phpstan-ignore-next-line */
        if (method_exists($this, "getNamePrefix")) {
            $name = $this->getNamePrefix() . $name;
        }

        /** @phpstan-ignore-next-line */
        if (method_exists($this, "getNameSuffix")) {
            $name = trim($this->getNameSuffix() . " " . $name);
        }

        return $name;
    }

    /**
     * @inheritDoc
     */
    public function getSymbol(): string
    {
        $symbol = $this->symbol ?? "";

        /** @phpstan-ignore-next-line */
        if (method_exists($this, "getSymbolPrefix")) {
            $symbol = $this->getSymbolPrefix() . $symbol;
        }

        /** @phpstan-ignore-next-line */
        if (method_exists($this, "getSymbolSuffix")) {
            $symbol .= $this->getSymbolSuffix();
        }

        return $symbol;
    }

    /**
     * @inheritDoc
     */
    public function is(Unit $unit): bool
    {
        return $this::class === $unit::class;
    }
}
