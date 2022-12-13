<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::group([
    'middleware' => 'api',
    'prefix'     => 'auth'
], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);

    Route::get('map-all-food-establishments', [AuthController::class, 'getAllFoodEstablishmentsOnMap']);
    Route::get('all-food-establishments', [AuthController::class, 'getAllFoodEstablishments']);
    Route::get('all-favorites', [AuthController::class, 'getAllFavorites']);
    Route::get('all-trending', [AuthController::class, 'getTrendingFoodEstablishments']);
    Route::get('all-recommended', [AuthController::class, 'getRecommendedFoodEstablishments']);
    Route::get('my-favorite/{id}', [AuthController::class, 'getMyFavorite']);
    Route::get('visited', [AuthController::class, 'getVisited']);
    Route::get('food-establishment/{id}', [AuthController::class, 'getFoodEstablishment']);
    Route::post('add-review/{id}', [AuthController::class, 'addReview']);
    Route::post('add-food', [AuthController::class, 'addFood']);
    Route::post('add-new-food', [AuthController::class, 'addFood']);

    Route::post('add-food-establishment', [AuthController::class, 'registerFoodEstablishment']);
    Route::post('add-food-establishment-image/{id}', [AuthController::class, 'uploadFoodEstablishmentImages']);
    Route::put('update-food-establishment/{id}', [AuthController::class, 'updateFoodEstablishment']);
    Route::post('update-food-establishment-image/{id}', [AuthController::class, 'updateFoodEstablishmentImages']);
    Route::post('add-views/{id}', [AuthController::class, 'addViews']);
    Route::post('add-to-favorites/{id}', [AuthController::class, 'addToFavorites']);
    Route::delete('remove-to-favorites/{id}', [AuthController::class, 'removeToFavorites']);
    
    Route::delete('delete-food/{id}', [AuthController::class, 'deleteFood']);
    Route::put('update-food-info/{id}', [AuthController::class, 'updateFoodInfo']);
    Route::post('update-food-image/{id}', [AuthController::class, 'updateFoodImage']);

    Route::post('add-food-image', [AuthController::class, 'uploadFoodImages']);
});