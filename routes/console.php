<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


use Illuminate\Http\Request;

Route::get('/hello', function () {
    return response()->json([
        'status'  => 'success',
        'message' => 'Halo dari API Laravel!',
        'data'    => [
            'name'     => 'API Sederhana',
            'version'  => '1.0.0',
        ]
    ]);
});