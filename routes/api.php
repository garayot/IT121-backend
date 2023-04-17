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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout', 'logout'); 
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::controller(CarouselItemsController::class)->group(function () { 
    Route::get('/carousel', 'index');
    Route::get('/carousel/{id}', 'show');
    Route::delete('/carousel/{id}','destroy');
    Route::post('/carousel', 'store');
    Route::put('/carousel/{id}', 'update');
});

 
Route::controller(UsersController::class)->group(function () { 
    Route::get('/users', 'index');
    Route::delete('/users/{id}', 'destroy');
    Route::get('/users/{id}', 'show');
    Route::post('/users', 'store')->name('user.store');  
    Route::put('/users/{id}', 'update')->name('user.update');  
    Route::put('/users/{id}', 'email')->name('user.email');   
    Route::put('/users/{id}', 'password')->name('user.password'); 
});

Route::controller(MessagesController::class)->group(function () { 
   
    Route::post('/message','store');
    Route::delete('/message/{id}','destroy');
    Route::get('/message','index');
    Route::get('/message/{id}','show');
    Route::put('/message/{id}','update');
});















