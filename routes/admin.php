<?php

use App\Http\Controllers\{
    Admin\PostsController,
    Admin\CitiesController,
    Admin\GovernoratesController,
    Admin\CategoriesController,
    Admin\SettingsController,
    Admin\DonationsController,
    Admin\UsersController,
    Admin\ClientsController,
    Admin\ContactsController,
    Admin\RolesController,
    Admin\DashboardController};

use Illuminate\Support\Facades\{Route,Auth};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=> ['auth:admin','DisabledAccountAdmin'],'prefix' => 'admin'],function (){

    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::resource('categories' , CategoriesController::class)->except(['show']);

    Route::resource('governorates' , GovernoratesController::class)->except(['show']);

    Route::resource('cities' , CitiesController::class)->except(['show']);

    Route::resource('posts' , PostsController::class)->except(['show']);

    Route::resource('donations' , DonationsController::class)->only(['index','destroy']);

    Route::resource('contacts' , ContactsController::class)->only(['index','destroy']);

    Route::resource('roles',RolesController::class);

    Route::resource('users' , UsersController::class)->except(['show']);

    Route::get('change-password',[UsersController::class,'changePassword']);
    Route::post('change-password',[UsersController::class,'updatePassword'])->name('update.password');

    Route::resource('clients' , ClientsController::class)->only(['index','destroy']);
    Route::post('clients/{id}/{status}',[ClientsController::class,'updateStatus']);

    Route::group(['controller'=>SettingsController::class],function (){
        Route::get('setting/edit','edit')->name('settingsEdit');
        Route::post('setting/update/{id}','update')->name('settingsUpdate');

    });

});

Route::group(['prefix' => 'admin'],function () {
    Auth::routes(['register' => false]);
});

Route::group(['controller'=>UsersController::class],function (){

    Route::get('admin/baned', 'baned')->name('admin.baned')
        ->middleware('redirectAdmin:admin');
    Route::post('admin-logout','banedLogout')->name('admin.baned.logout');
});


