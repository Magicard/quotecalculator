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

it('calculates delivery quote with extra person correctly and custom price', function () {
    $payload = [
        'distances' => [10, 20],
        'cost_per_mile' => 2.00,
        'extra_person' => true,
        'extra_person_price' => 30.00,
    ];

    $response = postJson('/api/quote', $payload);

    $response->assertStatus(200);
    $response->assertJson([
        'dropOffs' => 2,
        'totalDistance' => 30,
        'costPerMile' => 2.0,
        'extraPersonPrice' => 30,
        'totalCost' => 90, // (30 * 2) + 15
    ]);
});

it('calculate route validation test', function () {
    $payload = [
        'distances' => null,
        'cost_per_mile' => 'lots',
        'extra_person' => 2,
    ];

    $response = postJson('/api/quote', $payload);
    $response->assertStatus(422);
    $response->assertJsonValidationErrors([
        'distances' => 'The distances field is required.',
        'extra_person' => 'The extra person field must be true or false.',
        'cost_per_mile' => 'The cost per mile field must be a number.',
    ]);
});
