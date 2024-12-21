<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('generate_description', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
