<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes(['register'=>false]);

Route::view('/', 'welcome');

//use middleware verified for user has been verify the email
Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', [App\Http\Controllers\HomeController::class,'dashboard'])
        ->name('dashboard');

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])
        ->name('profile');

    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'removeDevice'])
        ->name('profile.device.delete');

    Route::group(['middleware'=>'role:admin'], function(){
        Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])
            ->name('users.index');

        Route::get('/user/create', [\App\Http\Controllers\UsersController::class, 'create'])
            ->name('users.create');

        Route::post('/user/store', [\App\Http\Controllers\UsersController::class, 'store'])
            ->name('users.store');

        Route::get('/user/{user}/edit', [\App\Http\Controllers\UsersController::class, 'edit'])
            ->name('users.edit');

        Route::put('/user/{user}/update', [\App\Http\Controllers\UsersController::class, 'update'])
            ->name('users.update');

        Route::get('/user/{user}/change-password', [\App\Http\Controllers\UsersController::class, 'changePassword'])
            ->name('users.change-password');

        Route::put('/user/{user}/update-password', [\App\Http\Controllers\UsersController::class, 'updatePassword'])
            ->name('users.update-password');

        Route::delete('/user/{user}/delete', [\App\Http\Controllers\UsersController::class, 'delete'])
            ->name('users.delete');
    });
    Route::prefix('/admin')->as('admin.')->middleware('role:admin')->group(function(){
        Route::resource('question', App\Http\Controllers\QuestionController::class)->only('index','create','edit');
        Route::view('/part', 'admin.part.index')->name('part.index');
        Route::resource('/test', App\Http\Controllers\TestController::class)->except('store','show','update');
    });

    Route::group(['prefix'=>'/user','middleware'=>'role:user','as'=>'user.'],function(){
        Route::get('test/result', [App\Http\Controllers\UserTestController::class, 'results'])->name('result');
        Route::resource('test', App\Http\Controllers\UserTestController::class)->only('index','show','update');
        Route::get('start-test', [App\Http\Controllers\UserTestController::class, 'test'])->name('test.start')->middleware('test');
    });
});
