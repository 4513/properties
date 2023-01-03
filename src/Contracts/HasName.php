<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Trait HasName
 *
 * @package MiBo\Properties\Contracts
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
trait HasName
{
    /**
     * Returns the name of the unit (e.g. meter).
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
