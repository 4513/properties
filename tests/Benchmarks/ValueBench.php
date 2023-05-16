<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Benchmarks;

use MiBo\Properties\Value;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Class ValueBench
 *
 * @package MiBo\Properties\Tests\Benchmarks
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class ValueBench
{
    /**
     * @return void
     *
     * @Revs(1000000)
     * @Iterations(2)
     */
    public function benchIntegers(): void
    {
        $value = 0;
        $value += 10;
        $value += 20;
        $value += 1;
        $value += 1;
        $value += 10;
        $value -= 10;
        $value -= 3;
        $value -= 5;
        $value += 2;
    }

    /**
     * @return void
     *
     * @Revs(1000000)
     * @Iterations(2)
     */
    public function benchValue(): void
    {
        $value = new Value(0);
        $value->add(10)
            ->add(20)
            ->add(1)
            ->add(1)
            ->add(10)
            ->subtract(10)
            ->subtract(3)
            ->subtract(5)
            ->add(2);
    }

    /**
     * @return void
     *
     * @Revs(1000000)
     * @Iterations(2)
     */
    public function benchInitializeInt(): void
    {
        $int = 100;
    }

    /**
     * @return void
     *
     * @Revs(1000000)
     * @Iterations(2)
     */
    public function benchInitializeValue(): void
    {
        $value = new Value(100);
    }
}
