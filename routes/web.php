<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NoticeController;

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

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});



Route::group(['prefix' => '/app', 'middleware' => ['auth']], function () {

    // User Part
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    // Project Part
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/{id}/destroy', [ProjectController::class, 'destroy'])->name('projects.destroy');


    Route::get('/projects/{id}/show', [ProjectController::class, 'show'])->name('projects.show');


    // Notice Part
    Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store');
    Route::get('/notices/{noticeId}/destroy', [NoticeController::class, 'destroy'])->name('notices.destroy');


});
