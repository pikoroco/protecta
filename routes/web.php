<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::redirect('/', '/login');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/author', AuthorController::class);
    Route::resource('/publication', PublicationController::class);
});
