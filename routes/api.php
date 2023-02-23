<?php


use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SessionsController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->post('/login', [\App\Http\Controllers\SessionsController::class, 'store']);
// Route::post('/login', [\App\Http\Controllers\SessionsController::class, 'store'])->middleware('guest');
// Route::post('/register', [\App\Http\Controllers\RegisterController . php::class, 'store'])->middleware('guest');
// //Route::middleware('auth:sanctum')->post('register',[\App\Http\Controllers\RegisterController.php::class,'store'])
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [SessionsController::class, 'store']);
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('projects', [ProjectController::class, 'index']);
    Route::get('add-project', [ProjectController::class, 'create'])->name('project.create');
});
