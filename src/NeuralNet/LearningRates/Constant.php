<?php

namespace Rubix\Engine\NeuralNet\LearningRates;

use Rubix\Engine\NeuralNet\Synapse;
use InvalidArgumentException;

class Constant implements LearningRate
{
    /**
     * The learning rate. i.e. the master step size.
     *
     * @var float
     */
    protected $rate;

    /**
     * @param  float  $rate
     * @throws \InvalidArgumentException
     * @return void
     */
    public function __construct(float $rate = 0.01)
    {
        if (!$rate > 0.0) {
            throw new InvalidArgumentException('The learning rate must be set to a positive value.');
        }

        $this->rate = $rate;
    }

    /**
     * Calculate the amount of a step of gradient descent.
     *
     * @param  \Rubix\Engine\NeuralNet\Synapse  $synapse
     * @param  float  $gradient
     * @return float
     */
    public function step(Synapse $synapse, float $gradient) : float
    {
        return $this->rate * $gradient;
    }
}