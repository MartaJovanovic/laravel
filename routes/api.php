<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'show']);



Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/{id}', [ServiceController::class, 'show']);



Route::resource('reviews', ReviewController::class)->only(['index']);


Route::get('/service/{id}/review', [ServiceReviewController::class, 'index'])->name('service.review.index');



//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! OBRATI PAZNJU
//ova linija je bila greska
//Route::resource('posts', [PostController::class]);
//drugi parametar kod resource-a nema niz vec samo PostController::class
// Route::resource('posts', PostController::class);
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// Route::post('/register', [AuthController::class, 'register']);

// Route::post('/login', [AuthController::class, 'login']);

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/profile', function (Request $request) {
//         return auth()->user();
//     });

//     Route::resource('posts', PostController::class)->only(['update', 'store', 'destroy']);

//     Route::post('/logout', [AuthController::class, 'logout']);
// });

// Route::resource('posts', PostController::class)->only(['index']);
