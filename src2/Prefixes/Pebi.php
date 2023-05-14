<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Pebi
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Pebi
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "Pi";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): int
    {
        return 2 ** 50;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "pebi";
    }
}
