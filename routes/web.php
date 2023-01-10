<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaildataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleCalendarController;

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
Route::controller(MaildataController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/maildatas/top', 'top');
    Route::get('/maildatas/create', 'create');
    Route::post('/maildatas', 'store');
    Route::get('/maildatas/{maildata}', 'show');
    Route::get('/maildatas/{maildata}/edit','edit');
    Route::put('/maildatas/{maildata}', 'update');
    Route::delete('/maildatas/{maildata}', 'delete');
});

Route::controller(CategoryController::class)->middleware(['auth'])->group(function(){
    Route::post('/categories', 'store');
    Route::get('/categories/list', 'lists');
    Route::get('/categories/{category}/edit', 'edit');
    Route::get('/categories/create', 'create');
    Route::put('/categories/{category}', 'update');
    Route::get('/categories/{category}', 'index');
    Route::delete('/categories/{category}', 'delete');
});

Route::controller(GoogleCalendarController::class)->middleware(['auth'])->group(function(){
  Route::post('/calendar', [GoogleCalendarController::class, 'index']);  
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';