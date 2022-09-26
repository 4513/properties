<?php

namespace MiBo\Properties\Contracts;

/**
 * Class NumericalUnit
 *
 * @package MiBo\Properties\Contracts
 *
 * @since 0.1
 *
 * @author Michal Boris <michal.boris@gmail.com>
 */
abstract class NumericalUnit extends Unit
{
    use HasMultiplier;
}
