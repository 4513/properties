<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Exbi
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Exbi
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "Ei";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): int
    {
        return 2 ** 60;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "exbi";
    }
}
