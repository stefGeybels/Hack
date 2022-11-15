<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PotionController::class, 'welcome']);
Route::get('/brewery', [PotionController::class, 'brewery']);
Route::post('/check-potion', [PotionController::class, 'checkPotion']);

Route::get('/you-must-be-a-wizard', [PotionController::class, 'claimPage']);
Route::post('/save-potion', [PotionController::class, 'claimPage']);
