<?php

declare(strict_types = 1);

namespace MiBo\Properties\Units\Mass;

use MiBo\Properties\Prefixes\Deca;

/**
 * Class DecaGram
 *
 * @package MiBo\Properties\Units\Mass
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since x.x
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class DecaGram extends Gram
{
    use Deca;
}