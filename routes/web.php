<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaildataController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [MaildataController::class, 'index']);

Route::get('/maildatas/top', [MaildataController::class, 'top']);

Route::get('/maildatas/create', [MaildataController::class, 'create']);

Route::post('/maildatas', [MaildataController::class, 'store']);

Route::get('/maildatas/{maildata}', [MaildataController::class, 'show']);

Route::get('/maildatas/{maildata}/edit', [MaildataController::class, 'edit']);

Route::put('/maildatas/{maildata}', [MaildataController::class, 'update']);

Route::post('/categories', [CategoryController::class, 'store']);

Route::get('/categories/list', [CategoryController::class, 'lists']);

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);

Route::get('/categories/create', [CategoryController::class, 'create']);

Route::put('/categories/{category}', [CategoryController::class, 'update']);

Route::get('/categories/{category}', [CategoryController::class, 'index']);

Route::delete('/maildatas/{maildata}', [MaildataController::class, 'delete']);

Route::delete('/categories/{category}', [CategoryController::class, 'delete']);

?>