<?php

namespace Rubix\ML\Tests\Kernels\Distance;

use Rubix\ML\Kernels\Distance\Canberra;
use Rubix\ML\Kernels\Distance\Distance;
use PHPUnit\Framework\TestCase;
use Generator;

class CanberraTest extends TestCase
{
    protected $kernel;

    public function setUp()
    {
        $this->kernel = new Canberra();
    }

    public function test_build_distance_kernel()
    {
        $this->assertInstanceOf(Canberra::class, $this->kernel);
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
        yield [[2, 1, 4, 0], [-2, 1, 8, -2], 2.333333333333333];
        yield [[7.4, -2.5], [0.01, -1], 1.4258723732407943];
        yield [[1000, -2000, 3000], [1000, -2000, 3000], 0.0];
    }
}
