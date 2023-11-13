<?php

use App\Http\Controllers\TidesController;
use App\Http\Controllers\MoonsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TidesController::class, 'index'])->name('tides');
Route::view('/moons', [MoonsController::class, 'index'])->name('moons');
