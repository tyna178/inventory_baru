<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// PASTIKAN DUA BARIS DI BAWAH INI ADA:
use App\Http\Controllers\SupplierController; 
use App\Http\Controllers\MedicineController;

Route::apiResource('suppliers', SupplierController::class);
Route::apiResource('medicines', MedicineController::class);