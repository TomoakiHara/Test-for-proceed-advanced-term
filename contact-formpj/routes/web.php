<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
// use App\Http\Controllers\SearchController;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/', [ContactController::class, 'index']);
Route::get('/confirm', [ContactController::class, 'confirm']);
Route::get('/modify', [ContactController::class, 'modify']);
Route::get('/send', [ContactController::class, 'send']);
Route::get('/manage', [SearchController::class, 'manage']);
Route::get('/search', [SearchController::class, 'search']);
Route::get('/recet', [SearchController::class, 'recet']);
Route::post('/delete', [SearchController::class, 'delete']);