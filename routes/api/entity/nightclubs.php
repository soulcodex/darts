<?php

use Illuminate\Support\Facades\Route;

Route::get('nightclubs', [
    'uses' => \App\Api\Controllers\Nightclub\GetNightclubCollectionController::class
]);

Route::get('nightclubs/{id}', [
    'uses' => \App\Api\Controllers\Nightclub\GetNightclubItemController::class
]);

Route::post('nightclubs', [
    'uses' => \App\Api\Controllers\Nightclub\CreateNightclubItemController::class
]);
