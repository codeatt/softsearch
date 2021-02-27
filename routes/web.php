<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inputSearchController;
use App\Http\Controllers\stackController;



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

Route::resource('/searchjs', inputSearchController::class)->only([
    'index', 'show'
]);

Route::any('/search', [stackController::class, 'show', 'categoryFetch']);



