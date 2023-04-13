<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarouselItemsController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/carousel', [CarouselItemsController::class, 'index']);

 Route::get('/carousel/{id}', [CarouselItemsController::class, 'show']);

 Route::delete('/carousel/{id}', [CarouselItemsController::class, 'destroy']);

 Route::post('/carousel', [CarouselItemsController::class, 'store']);

 Route::put('/carousel/{id}', [CarouselItemsController::class, 'update']);
 


Route::get('/users', [UsersController::class, 'index']);

Route::delete('/users/{id}', [UsersController::class, 'destroy']);

Route::get('/users/{id}', [UsersController::class, 'show']);

Route::post('/users', [UsersController::class, 'store'])->name('user.store');

Route::put('/users/{id}', [UsersController::class, 'update'])->name('user.update');

Route::put('/users/{id}', [UsersController::class, 'email'])->name('user.email'); 

Route::put('/users/{id}', [UsersController::class, 'password'])->name('user.password'); 


Route::post('/message', [messageController::class, 'store']);

Route::delete('/message/{id}', [messageController::class, 'destroy']);













