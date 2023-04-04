<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarouselItemsController;
use App\Http\Controllers\API\UsersController;
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


Route::get('/carousel', [UsersController::class, 'index']);

Route::delete('/carousel/{id}', [UsersController::class, 'destroy']);

Route::get('/carousel/{id}', [UsersController::class, 'show']);





