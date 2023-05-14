<?php

declare(strict_types = 1);

namespace MiBo\Properties\Traits;

/**
 * Trait MetricUnit
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait MetricUnit
{
    /**
     * @inheritDoc
     */
    public function isMetric(): bool
    {
        return true;
    }
}
