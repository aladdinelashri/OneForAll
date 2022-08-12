<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/adminpage1', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('adminpage1');
});

Route::get('/adminpage2', function () {
    return view('adminpage2');
});


Route::get('/adminpage3', function () {
    return view('adminpage3');
});

Route::get('/adminpage4', function () {
    return view('adminpage4');
});

Route::get('/adminpage5', function () {
    return view('adminpage5');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' =>'auth'], function () {
       Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class)
            ->only(['edit', 'update']);
        
        Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');

       
    });
});




require __DIR__.'/auth.php';
