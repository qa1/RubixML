<?php

namespace Rubix\ML\Tests\Kernels\Distance;

use Rubix\ML\Kernels\Distance\Euclidean;
use Rubix\ML\Kernels\Distance\Distance;
use PHPUnit\Framework\TestCase;
use Generator;

class EuclideanTest extends TestCase
{
    protected $kernel;

    public function setUp()
    {
        $this->kernel = new Euclidean();
    }

    public function test_build_distance_kernel()
    {
        $this->assertInstanceOf(Euclidean::class, $this->kernel);
        $this->assertInstanceOf(Distance::class, $this->kernel);
    }

    /**
     * @dataProvider compute_provider
     */
    public function test_compute(array $a, array $b, float $expected)
    {
        $distance = $this->kernel->compute($a, $b);

        $this->assertGreaterThanOrEqual(0., $distance);
        $this->assertEquals($expected, $distance);
    }

    public function compute_provider() : Generator
    {
        yield [[2, 1, 4, 0], [-2, 1, 8, -2],  6.0];
        yield [[7.4, -2.5], [0.01, -1], 7.540696254325591];
        yield [[1000, -2000, 3000], [1000, -2000, 3000], 0.0];
    }
}
