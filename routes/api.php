<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarouselItemsController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\AuthController;

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


Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user', [UsersController::class, 'store'])->name('user.store');



Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); 

    Route::controller(CarouselItemsController::class)->group(function () { 
        Route::get('/carousel', 'index');
        Route::get('/carousel/{id}', 'show');
        Route::delete('/carousel/{id}','destroy');
        Route::post('/carousel', 'store');
        Route::put('/carousel/{id}', 'update');
    });
    Route::controller(UsersController::class)->group(function () { 
        Route::get('/user', 'index');
        Route::delete('/user/{id}', 'destroy');
        Route::get('/user/{id}', 'show');
        Route::post('/user', 'store')->name('user.store');  
        Route::put('/user/{id}', 'update')->name('user.update');  
        Route::put('/user/{id}', 'email')->name('user.email');   
        Route::put('/user/{id}', 'password')->name('user.password'); 
    });

});    




Route::controller(MessagesController::class)->group(function () { 
   
    Route::post('/message','store');
    Route::delete('/message/{id}','destroy');
    Route::get('/message','index');
    Route::get('/message/{id}','show');
    Route::put('/message/{id}','update');
});















