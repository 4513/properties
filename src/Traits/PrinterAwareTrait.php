<?php

declare(strict_types=1);

namespace MiBo\Properties\Traits;

use MiBo\Properties\Contracts\PrinterInterface;

/**
 * Trait PrinterAwareTrait
 *
 * @package MiBo\Properties\Traits
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
trait PrinterAwareTrait
{
    protected ?PrinterInterface $printer = null;

    /**
     * @inheritDoc
     */
    public function setPrinter(PrinterInterface $printer): void
    {
        $this->printer = $printer;
    }

    /**
     * Prints the property.
     *
     * @return string|null
     */
    public function print(): ?string
    {
        return $this->printer?->printProperty($this);
    }
}
