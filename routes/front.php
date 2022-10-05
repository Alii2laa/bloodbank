<?php

use App\Http\Controllers\{
    Admin\ClientsController,
    Front\AuthController,
    Front\DonationsController,
    Front\MainController,
    Front\PostsController,
    Front\ProfileController};
use Illuminate\Support\Facades\{Route,Auth};


Route::group(['middleware' => ['DisabledAccount','auth:client']],function (){

Route::group(['controller' => MainController::class],function (){
    Route::get('/','index')->name('front.home');
    Route::get('/about','about')->name('about');
    Route::get('/contact','contactShow')->name('contact.show');
    Route::post('/contact','contact')->name('contact');
});

Route::group(['controller' => DonationsController::class],function (){

    Route::get('/donations','donations')->name('donations');
    Route::get('/donation/{id}','donationShow')->name('donation.show');
    Route::get('/donation-create','donationView')->name('donation.create.show');
    Route::post('/donation-create','donationCreate')->name('donation.create');


});

Route::group(['controller' => ProfileController::class],function (){
    Route::get('profile','profileData')->name('profile.data');
    Route::post('update-profile','profileUpdateData')->name('profile.update');
    Route::get('notification-peripherals','notificationPeripherals')->name('peripherals.data');
    Route::post('notification-peripherals','createNotificationPeripherals')->name('peripherals.update');
});

Route::group(['controller' => PostsController::class],function (){
    Route::get('posts','allPosts')->name('post.index');
    Route::get('/post/{id}','postShow')->name('post.show');
    Route::get('favourited-posts','favouritedPosts')->name('post.favourited');
    Route::post('favourite-post','favouritePost');
});

Route::group(['controller' => AuthController::class],function (){
    Route::post('logout','logout')->name('front.logout');
    Route::get('change-password','changePassword')->name('front.password.show');
    Route::post('update-password','updatePassword')->name('front.password-update');
});


});

Route::group(['controller' => AuthController::class],function (){


    Route::group(['middleware' => 'guest:client'],function (){

        Route::get('register','registerView')->name('front.register.show');
        Route::post('register','register')->name('front.register');
        Route::get('login','loginView')->name('front.login.show');
        Route::post('login','login')->name('front.login');


        Route::get('reset','resetPasswordView');
        Route::post('reset-password','resetPassword');
        Route::get('change/{code?}','changePasswordForgetView');
        Route::post('change-password-forget','changePasswordForget');
    });
});



Route::group(['controller' => AuthController::class],function (){

    Route::get('baned','baned')->name('client.baned')
        ->middleware('redirectClient:client');
    Route::post('client-logout','banedLogout')->name('front.baned.logout');

});
