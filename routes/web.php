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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('registerUser', 'App\Http\Controllers\UsersController@registerUser');
Route::post('loginUser','App\Http\Controllers\UsersController@loginUser');

Route::group(['middleware'=>'customAuth'],function(){
    Route::view('login','login');
    Route::view('register','registration');
    
    Route::get('/logout', function(){
        session()->forget('user');
        return redirect('/');
    });

    Route::get('/', 'App\Http\Controllers\PostsController@index');
    
    Route::view('/add', 'Post.add');
    Route::post('/addPost', 'App\Http\Controllers\PostsController@addPost');
    Route::post('/addPost/{id}', 'App\Http\Controllers\PostsController@addPost');
    Route::get('/edit/{id}', 'App\Http\Controllers\PostsController@edit');
    
    Route::get('/mypost', 'App\Http\Controllers\PostsController@mypost');
    Route::get('/delete-post/{id}', 'App\Http\Controllers\PostsController@delete');
});    