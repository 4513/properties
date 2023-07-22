<?php

declare(strict_types=1);

namespace MiBo\Properties;

/**
 * Class Amount
 *
 * @package MiBo\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class Amount extends NumericalProperty
{
    /**
     * @inheritDoc
     */
    public static function getQuantityClassName(): string
    {
        return Quantities\Amount::class;
    }
}
