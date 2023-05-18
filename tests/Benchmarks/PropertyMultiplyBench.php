<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Benchmarks;

use MiBo\Properties\Calculators\PropertyCalc;
use MiBo\Properties\Length;
use MiBo\Properties\Units\Length\DeciMeter;
use MiBo\Properties\Units\Length\Meter;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class PropertyMultiplyBench
 *
 * @package MiBo\Properties\Tests\Benchmarks
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PropertyMultiplyBench
{
    /**
     * @return void
     *
     * @Revs(1000000)
     * @Iterations(2)
     */
    public function benchMultiply(): void
    {
        $property1 = new Length(1, Meter::get());
        $property2 = new Length(10 * 10, DeciMeter::get());
        $result    = PropertyCalc::multiply($property1, $property2);
    }
}
