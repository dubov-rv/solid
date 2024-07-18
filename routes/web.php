<?php

use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShapeController;
use App\Http\Controllers\Backend\TaskController;
use App\Models\Shape\Circle;
use App\Models\Shape\Rectangle;
use App\Models\Shape\Square;
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

Route::get('/area/rectangle/{width}/{height}', function ($width, $height) {
    $rectangle = new Rectangle($width, $height);
    return (new ShapeController())->getArea($rectangle);
});

Route::get('/perimeter/rectangle/{width}/{height}', function ($width, $height) {
    $rectangle = new Rectangle($width, $height);
    return (new ShapeController())->getPerimeter($rectangle);
});

Route::get('/area/square/{side}', function ($side) {
    $square = new Square($side);
    return (new ShapeController())->getArea($square);
});

Route::get('/perimeter/square/{side}', function ($side) {
    $square = new Square($side);
    return (new ShapeController())->getPerimeter($square);
});

Route::get('/area/circle/{radius}', function ($radius) {
    $circle = new Circle($radius);
    return (new ShapeController())->getArea($circle);
});

Route::get('/perimeter/circle/{radius}', function ($radius) {
    $circle = new Circle($radius);
    return (new ShapeController())->getPerimeter($circle);
});

Route::resource('/messages', MessageController::class)->only('index', 'store', 'update', 'destroy')->names('backend.messages');

Route::get('/send-notification', [NotificationController::class, 'sendNotification']);
