<?php

use Simplexi\Greetr\Greetr;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;


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

Route::get('fill-data-pdf', [PDFController::class,'index']);

Route::get('/', function () {
    $browser = Agent::browser();
    $version = Agent::version($browser);

    dd($browser, $version);
});

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');


Route::get('/welcome', function () {
    return view('welcome2');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';








