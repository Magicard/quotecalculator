<?php

namespace App\Services;

/**
 * Class QuoteData
 */
class QuoteData
{
    /**
     * @param array $distances
     * @param float $costPerMile
     * @param bool $extraPerson
     * @param float $extraPersonPrice
     */
    public function __construct(
        public array $distances,
        public float $costPerMile,
        public bool $extraPerson = false,
        public float $extraPersonPrice = 15,
    ) {}
}
