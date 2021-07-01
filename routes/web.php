<?php

use App\Http\Controllers\RoverController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', [RoverController::class, 'home'])
    ->name('home');

// Rover Results
Route::post('/results', [RoverController::class, 'giveCommands'])
    ->name('rover.results');
