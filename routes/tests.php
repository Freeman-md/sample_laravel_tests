<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\PurchaseController;


Route::get('/about', function() {
  return 'About';
});

Route::resource('/beverages', BeverageController::class);

Route::post('beverages/buy', [PurchaseController::class, 'buy']);