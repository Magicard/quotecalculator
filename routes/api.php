<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

//Add within the Auth middleware once setup
Route::post('/quote', [QuoteController::class, 'calculate']);
