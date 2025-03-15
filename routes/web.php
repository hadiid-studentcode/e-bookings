<?php

use App\Http\Controllers\PaymentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/createTransaction', [PaymentsController::class, 'createTransaction'])->name('createTransaction');


