<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Area;

use MiBo\Properties\Prefixes\Hecto;
use MiBo\Properties\Traits\AcceptedBySIUnit;

/**
 * Class HectAre
 *
 * @package MiBo\Properties\Units\Area
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class HectAre extends Are
{
    use Hecto;
    use AcceptedBySIUnit;

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return "hectare";
    }
}
