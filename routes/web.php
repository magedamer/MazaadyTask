<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salary', function () {
    return view('salary');
})->name('salary.form');

Route::post('/salary/submit', [SalaryController::class, 'submit'])->name('salary.submit');
