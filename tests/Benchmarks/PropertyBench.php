<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Benchmarks;

use MiBo\Properties\Length;
use MiBo\Properties\Units\Length\Meter;
use PhpBench\Benchmark\Metadata\Annotations\Assert;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class PropertyBench
 *
 * @package MiBo\Properties\Tests\Benchmarks
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class PropertyBench
{
    /**
     * @return void
     *
     * @Revs(1000000)
     * @Iterations(2)
     * @Assert("mode(variant.time.avg) < 2.0 microseconds +/- 5%")
     */
    public function benchPropertyCalc(): void
    {
        $property = new Length(10, Meter::get());
        $property->add(10);

        $value = $property->getValue();
    }
    /**
     * @return void
     *
     * @Revs(1000000)
     * @Iterations(2)
     * @Assert("mode(variant.time.avg) < 1.6 microseconds +/- 5%")
     */
    public function benchProperty(): void
    {
        $property = new Length(10, Meter::get());

        $value = $property->getValue();
    }
}
