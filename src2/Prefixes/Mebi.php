<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Mebi
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Mebi
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "Mi";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): int
    {
        return 2 ** 20;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "mebi";
    }
}
