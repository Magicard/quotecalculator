<?php

namespace App\Http\Controllers;

use App\Services\QuoteData;
use Illuminate\Http\Request;
use App\Services\DeliveryQuoteCalculator;
use App\Http\Requests\CalculateQuoteRequest;

class QuoteController extends Controller
{
    //Calculate the quote based on the request data
    public function calculate(CalculateQuoteRequest $request, DeliveryQuoteCalculator $calculator)
    {
        $data = new QuoteData(
            distances: $request->input('distances'),
            costPerMile: $request->input('cost_per_mile'),
            extraPerson: $request->input('extra_person'),
            extraPersonPrice: 15.00
        );

        $quote = $calculator->calculate($data);

        return response()->json($quote);
    }
}
