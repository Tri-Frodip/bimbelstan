<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes(['register'=>false]);

Route::view('/', 'welcome');
Route::view('/try-out', 'try-out');
Route::get('/paket-bimbel/{price}', [\App\Http\Controllers\HomeController::class, 'bimbel']);
Route::post('/paket-bimbel/{price}', [\App\Http\Controllers\HomeController::class, 'register_bimbel']);
Route::view('/kontak-kami', 'about-us');

//use middleware verified for user has been verify the email
Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', [\App\Http\Controllers\HomeController::class,'dashboard'])
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

        Route::get('/users/results', [\App\Http\Controllers\UserTestController::class, 'test_results'])->name('user-test.result');
        Route::get('/users/results/{user}', [\App\Http\Controllers\UserTestController::class, 'export_pdf'])->name('user-test.export_pdf');

        Route::get('export-users', [\App\Http\Controllers\UsersController::class, 'export']);
    });
    Route::prefix('/admin')->as('admin.')->middleware('role:admin')->group(function(){
        Route::resource('question', \App\Http\Controllers\QuestionController::class)->only('index', 'show');
        Route::get('/question/{part}/create', [\App\Http\Controllers\QuestionController::class, 'create'])->name('question.create');
        Route::post('/question/{part}/store', [\App\Http\Controllers\QuestionController::class, 'store'])->name('question.store');
        Route::get('/question/{part}/{question}/edit', [\App\Http\Controllers\QuestionController::class, 'edit'])->name('question.edit');
        Route::put('/question/{part}/{question}/update', [\App\Http\Controllers\QuestionController::class, 'update'])->name('question.update');

        Route::view('/part', 'admin.part.index')->name('part.index');
        Route::resource('/test', \App\Http\Controllers\TestController::class)->except('store','show','update');
        Route::delete('reset-test/{user}', [\App\Http\Controllers\UserTestController::class, 'reset']);
    });

    Route::group(['prefix'=>'/user','middleware'=>'role:user','as'=>'user.'],function(){
        Route::get('test/result', [\App\Http\Controllers\UserTestController::class, 'results'])->name('result');
        Route::resource('test', \App\Http\Controllers\UserTestController::class)->only('index','show','update');
        Route::get('start-test', [\App\Http\Controllers\UserTestController::class, 'test'])->name('test.start')->middleware('test');
    });
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
