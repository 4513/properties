<?php

declare(strict_types=1);

namespace MiBo\Properties\Traits;

/**
 * Trait NotMetricUnit
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait NotMetricUnit
{
    /**
     * @inheritDoc
     */
    public function isMetric(): bool
    {
        return false;
    }
}
