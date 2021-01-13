<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RulesController;

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
    return view('home');
})->name('home');

Route::get('/', [RulesController::class, 'create'])->name('main');
Route::get('/show', [RulesController::class, 'show'])->name('show');
Route::get('/rules', [RulesController::class, 'index'])->name('rules');
Route::post('/create/rules', [RulesController::class, 'store'])->name('registrar_regra_diaria');

