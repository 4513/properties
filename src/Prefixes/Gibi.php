<?php

declare(strict_types=1);

namespace MiBo\Properties\Prefixes;

use MiBo\Properties\Traits\UnitHelper;

/**
 * Trait Gibi
 *
 * @package MiBo\Properties\Prefixes
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait Gibi
{
    /**
     * @inheritdoc
     */
    protected function getSymbolPrefix(): string
    {
        return "Gi";
    }

    /**
     * @inheritdoc
     */
    protected function getMultiplierPrefix(): int
    {
        return 2 ** 30;
    }

    /**
     * @inheritdoc
     */
    protected function getNamePrefix(): string
    {
        return "gibi";
    }
}
