<?php

namespace App\Services;

/**
 * Class QuoteResponse
 */
class QuoteResponse
{
    /**
     * @param int $dropOffs
     * @param float $totalDistance
     * @param float $costPerMile
     * @param float $extraPersonPrice
     * @param float $totalCost
     */
    public function __construct(
        public int $dropOffs,
        public float $totalDistance,
        public float $costPerMile,
        public float $extraPersonPrice,
        public float $totalCost,
    ) {}
}
