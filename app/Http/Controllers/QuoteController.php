<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DeliveryQuoteCalculator;

class QuoteController extends Controller
{
    public function calculate(Request $request, DeliveryQuoteCalculator $calculator)
    {
        $validated = $request->validate([
            'distances' => 'required|array|min:1|max:5',
            'distances.*' => 'numeric|min:0',
            'cost_per_mile' => 'required|numeric|min:0',
            'extra_person' => 'boolean',
        ]);

        $data = new QuoteData(
            distances: $validated['distances'],
            costPerMile: $validated['cost_per_mile'],
            extraPerson: $validated['extra_person'] ?? false
        );

        $result = $calculator->calculate($data);

        return response()->json($result);
    }
}
