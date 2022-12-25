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
Route::controller(\App\Http\Controllers\PostController::class)->middleware('auth')->group(function (){
    Route::get('/posts' , 'index')->name('allPosts');
    Route::get('/addPost' , 'show');
    Route::post('/SavePosts' , 'store')->name("savePost");
    Route::get('/editPost/{id}' , 'edit')->name('updatePage');
    Route::patch('/updatePost/{id}' , 'update')->name("updatePost");
    Route::delete('/deletePost/{id}' , 'delete')->name("deletePost");
});
Route::controller(\App\Http\Controllers\CommentController::class)->middleware('auth')->group(function (){

    Route::get('/posts/{id}/comments' , 'index')->name('allcommentsPost');
        Route::delete('/deletecomment/{id}' , 'delete')->name("deletecomment");


});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
