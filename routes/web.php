<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

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
//
Route::get('/project', function () {
    return view('project');
});
Route::get('/',[SessionsController::class,'create'])->name('login')->middleware('guest');
Route::post('/',[SessionsController::class,'store']);
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::get('register',[RegisterController::class,'create'])->middleware('guest');;
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('add-project',[ProjectController::class,'create'])->name('project.create')->middleware('auth');
Route::post('project',[ProjectController::class,'store']);
Route::get('/project/{project}/edit',[ProjectController::class,'edit']);
Route::patch('/project/{project}',[ProjectController::class,'update'])->name('project.update');
Route::delete('/project/{project}',[ProjectController::class,'destroy']);
