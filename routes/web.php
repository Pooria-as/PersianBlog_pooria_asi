<?php

use Illuminate\Support\Facades\Auth;
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



Route::prefix('admin')->middleware("auth")->group(function () {
    Route::get('/', function () {
        return view("Dashbord.index");
    });
    Route::resource('Category', "Admin\CategoryController");
    Route::resource('Post', "Admin\PostController");
    Route::resource('Tag', "Admin\TagController");
    Route::resource('User', "Admin\UserController");
    Route::resource('Comment', "Admin\CommentController");
    Route::post('Comment/{post}', "Admin\CommentController@createComment")->name("createComment");
    Route::put('Comment/{comment}/Disable', "Admin\CommentController@Disable")->name("DisableComment");
    Route::put('Comment/{comment}/Enable', "Admin\CommentController@Enable")->name("EnableComment");
    Route::put('User/{user}/Admin', "Admin\UserController@Admin")->name("admin");
    Route::put('User/{user}/Normal-User', "Admin\UserController@NormalUser")->name("user");
});

Route::resource('/', "PostController");
Route::get("single/{post}","PostController@single")->name("single");
Route::put("like/{post}","PostController@like")->name("like");
Route::put("disslike/{post}","PostController@disslike")->name("dislike");

Route::get("Archive","ArchiveCategoryController@index")->name("archive");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
