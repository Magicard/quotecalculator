<?php

namespace App\Services;

use App\Services\QuoteData;
use App\Services\QuoteResponse;

class DeliveryQuoteCalculator
{
    public function calculate(QuoteData $data): QuoteResponse
    {
        $totalDistance = array_sum($data->distances);
        $baseCost = $totalDistance * $data->costPerMile;
        $extra = $data->extraPerson ? $data->extraPersonPrice : 0.0;

        return new QuoteResponse(
            dropOffs: count($data->distances),
            totalDistance: $totalDistance,
            costPerMile: $data->costPerMile,
            extraPersonPrice: $extra,
            totalCost: $baseCost + $extra
        );
    }
}
