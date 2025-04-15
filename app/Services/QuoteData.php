<?php

namespace App\Services;

class QuoteData
{
    public function __construct(
        public array $distances,
        public float $costPerMile,
        public bool $extraPerson = false,
        public float $extraPersonPrice = 15,
    ) {}
}
