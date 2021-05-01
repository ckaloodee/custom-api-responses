<?php

use App\Http\Controllers\api\v1\ClientController;
use Illuminate\Support\Facades\Route;

Route::post('/clients', [ClientController::class, 'create'])->name('clients.create');
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
