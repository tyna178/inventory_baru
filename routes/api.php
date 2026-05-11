<?php

Route::get('test', function () {
    return response()->json(['message' => 'OK']);
    Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Endpoint berhasil!'

        Route::apiResource('/categories', CategoryController::class);
    ]);
});
});