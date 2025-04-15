<?php

namespace App\Http\Controllers;

use App\Services\QuoteData;
use Illuminate\Http\Request;
use App\Services\DeliveryQuoteCalculator;
use App\Http\Requests\CalculateQuoteRequest;

class QuoteController extends Controller
{
    public function calculate(CalculateQuoteRequest $request, DeliveryQuoteCalculator $calculator)
    {
        $validated = $request->validated();

        $data = new QuoteData(
            distances: $validated['distances'],
            costPerMile: $validated['cost_per_mile'],
            extraPerson: $validated['extra_person'] ?? false
        );

        $result = $calculator->calculate($data);

        return response()->json($result);
    }
}
