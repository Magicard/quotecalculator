<?php

namespace App\Services;

class QuoteResponse
{
    public function __construct(
        public int $dropOffs,
        public float $totalDistance,
        public float $costPerMile,
        public float $extraPersonPrice,
        public float $totalCost,
    ) {}
}
