<?php

namespace App\Http\Controllers;

use App\Services\QuoteData;
use Illuminate\Http\Request;
use App\Services\DeliveryQuoteCalculator;
use App\Http\Requests\CalculateQuoteRequest;

class QuoteController extends Controller
{
    //Calculate the quote based on the request data
    public function calculate(CalculateQuoteRequest $request)
    {
        // Grab the calculator
        $calculator= new DeliveryQuoteCalculator();

        // Validate the request data
        $data = new QuoteData(
            distances: $request->input('distances'),
            costPerMile: $request->input('cost_per_mile'),
            extraPerson: $request->input('extra_person', false),
            extraPersonPrice: $request->input('extra_person_price', 15),
        );

        // Calculate the quote
        $quote = $calculator->calculate($data);

        // Return the response
        return response()->json($quote);
    }
}
