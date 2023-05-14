<?php

declare(strict_types = 1);

namespace MiBo\Properties\Traits;

/**
 * Trait EnglishUnit
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait EnglishUnit
{
    /**
     * @inheritDoc
     */
    public function isEnglish(): bool
    {
        return true;
    }
}
