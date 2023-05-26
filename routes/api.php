<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarouselItemsController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\AIController;
use App\Http\Controllers\API\PromptController;

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

//Public APIs
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user', [UsersController::class, 'store'])->name('user.store');

//OCR API
Route::post('/ocr', [AIController::class, 'ocr'])->name('ocr.image');

// Private APIs
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    //Admin APIs
    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/carousel', 'index');
        Route::get('/carousel/{id}', 'show');
        Route::delete('/carousel/{id}', 'destroy');
        Route::post('/carousel', 'store');
        Route::put('/carousel/{id}', 'update');
    });

    Route::controller(UsersController::class)->group(function () {
        Route::get('/user', 'index');
        Route::delete('/user/{id}', 'destroy');
        Route::get('/user/{id}', 'show');
        Route::post('/user', 'store')->name('user.store');
        Route::put('/user/{id}', 'update')->name('user.update');
        Route::put('/user/email/{id}', 'email')->name('user.email');
        Route::put('/user/password/{id}', 'password')->name('user.password');
        Route::put('/user/image/{id}', 'image')->name('user.image');
    });
    //User Specific API
    Route::put('/profile/image', [ProfileController::class, 'image'])->name('profile.image');
    Route::get('/profile/show', [ProfileController::class, 'show']);
});

Route::get('/prompt/{id}', [PromptController::class, 'show']);
Route::get('/prompt', [PromptController::class, 'index']);
Route::post('/prompt', [PromptController::class, 'store']);
Route::delete('/prompt/{id}', [PromptController::class, 'destroy']);



Route::controller(MessagesController::class)->group(function () {

    Route::post('/message', 'store');
    Route::delete('/message/{id}', 'destroy');
    Route::get('/message', 'index');
    Route::get('/message/{id}', 'show');
    Route::put('/message/{id}', 'update');
});
