<?php

use App\Http\Controllers\Api\{PostsController,AuthController,MainController,DonationsController,ProfileController};
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

Route::group(['prefix'=>'v1','controller' => MainController::class,'middleware' => 'auth:api'],function (){
    Route::get('governorates','allGovernorates');
    Route::get('cities','allCities');
    Route::get('settings','settings');
    Route::get('blood-types','allBloodTypes');
    Route::get('categories','allCategories');
    Route::post('contactus','contactUS');


    Route::post('logout','logout');

});

Route::group(['prefix'=>'v1','controller' => PostsController::class,'middleware' => 'auth:api'],function (){
    Route::get('posts','allPosts');
    Route::get('post','singlePost');
    Route::post('favourite-post','favouritePost');
    Route::get('favourited-posts','favouritedPosts');
});

Route::group(['prefix'=>'v1','controller' => DonationsController::class,'middleware' => 'auth:api'],function (){
    Route::get('donations','allDonations');
    Route::get('donation','singleDonation');
    Route::post('donation-create','createDonation');

});

Route::group(['prefix'=>'v1','controller' => ProfileController::class,'middleware' => 'auth:api'],function (){
    Route::get('profile','profileData');
    Route::post('update-profile','profileUpdateData');
    Route::get('notification-peripherals','notificationPeripherals');
    Route::post('notification-peripherals','createNotificationPeripherals');
});

Route::group(['prefix'=>'v1','controller' => AuthController::class,'middleware' => 'auth:api'],function (){
    Route::post('register_token','registerToken');

});

Route::group(['prefix'=>'v1','controller' => AuthController::class],function (){
    Route::post('register','register');
    Route::post('login','login');
    Route::post('reset-password','resetPassword');
    Route::post('change-password','changePassword')->middleware('throttle:password-rate-limit');
});

Route::group(['prefix'=>'v1'],function (){
    Route::post('test_notify',[\App\Http\Controllers\HomeController::class,'testNotification']);
});

