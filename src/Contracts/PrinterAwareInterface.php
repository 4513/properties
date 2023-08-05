<?php

declare(strict_types=1);

namespace MiBo\Properties\Contracts;

/**
 * Interface PrinterAwareInterface
 *
 * @package MiBo\Properties\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 1.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface PrinterAwareInterface
{
    /**
     * Set a printer.
     *
     * @param \MiBo\Properties\Contracts\PrinterInterface $printer
     *
     * @return void
     */
    public function setPrinter(PrinterInterface $printer): void;
}
