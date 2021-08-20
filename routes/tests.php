<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeverageController;


Route::get('/about', function() {
  return 'About';
});

Route::resource('/beverages', BeverageController::class);