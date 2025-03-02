<?php

use Illuminate\Support\Facades\Route;

Route::options('{any}', function () {
    return response()->json([], 200, [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
    ]);
})->where('any', '.*');


Route::get('/message', function () {
    return response()->json(['message' => 'Hello from Laravel API!']);
});