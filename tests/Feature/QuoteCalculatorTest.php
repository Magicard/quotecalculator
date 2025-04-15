<?php

use Illuminate\Support\Facades\Http;
use function Pest\Laravel\postJson;

it('calculates delivery quote correctly', function () {
    $payload = [
        'distances' => [55, 13, 22],
        'cost_per_mile' => 1.00,
        'extra_person' => false,
    ];

    $response = postJson('/api/quote', $payload);

    $response->assertStatus(200);
    $response->assertJson([
        'dropOffs' => 3,
        'totalDistance' => 90,
        'costPerMile' => 1.0,
        'extraPersonPrice' => 0.0,
        'totalCost' => 90.0,
    ]);
});

it('calculates delivery quote with extra person correctly', function () {
    $payload = [
        'distances' => [10, 20],
        'cost_per_mile' => 2.00,
        'extra_person' => true,
    ];

    $response = postJson('/api/quote', $payload);

    $response->assertStatus(200);
    $response->assertJson([
        'dropOffs' => 2,
        'totalDistance' => 30,
        'costPerMile' => 2.0,
        'extraPersonPrice' => 15.0,
        'totalCost' => 75.0, // (30 * 2) + 15
    ]);
});
