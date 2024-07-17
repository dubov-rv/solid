<?php

use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/tasks', TaskController::class)->only('index', 'store', 'update', 'destroy')->names('backend.tasks');
Route::get('/tasks/export/csv', [TaskController::class, 'exportCSV'])->name('backend.tasks.export.csv');

Route::resource('/products', ProductController::class)->only('index', 'store', 'update', 'destroy')->names('backend.products');
