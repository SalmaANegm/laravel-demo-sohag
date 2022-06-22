<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
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

// Route::get('/profil', function () {
//     return view('welcome');
// });

// Route::get('/users', [UserController::class, 'index']);
Route::get('/my_home/kj/sdfsdfhk', ['App\Http\Controllers\UserController', 'index'])->name('home');
// Route::view('/', 'welcome', ['name' => 'Salma']);

// Route::get('/users/{id}/{name?}', function($user_id){
//     return "USer ID: $user_id, NAme:";
// });

Route::name('users.')->prefix('users')->controller('App\Http\Controllers\UserController')->group(function(){
    Route::get('/{id}/{name?}', 'show') ->where('id', '[0-9]+')->name('show');
    Route::get('','index') ->name('index');
});

Route::get('there', function(){
    return route('users.show', ['id' => 6, 'name' => 'salma', 'q' => '123']);
});

Route::redirect('/here', '/there');
// Route::get('/register');
// Route::post('registration', );

// Route::fallback(function () {
//     return 'Oooops!!';
// });
// Route::get('/', 'App\Http\Controllers\UserController@index');
