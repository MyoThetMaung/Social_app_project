<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactUsController;

Route::group(['middleware' => 'noauth'], function () {
    //Auth
    Route::get('login',[AuthController::class,'login'] )->name('login');
    Route::post('login',[AuthController::class,'post_login'] )->name('post_login');
    Route::get('register',[AuthController::class,'register'] )->name('register');
    Route::post('register',[AuthController::class,'post_register'] )->name('post_register');
});


Route::group(['middleware' => 'auth'], function () {
    //PageController
    Route::get('/', [PageController::class,'index'])->name('index');
    Route::get('posts/{id}',[PageController::class,'showPostById'] )->name('showPostById');
    Route::get('user/createPost',[PageController::class,'createPost'] )->name('createPost');
    Route::get('posts/edit/{id}',[PageController::class,'editPost'] )->name('editPost')->middleware('premiumUser');
    Route::get('user/contactUs',[PageController::class,'contactUs'] )->name('contactUs');
    Route::get('user/userProfile',[PageController::class,'userProfile'] )->name('userProfile');

    // PostController
    Route::get('posts/delete/{id}',[PostController::class,'deletePost'] )->name('deletePost')->middleware('premiumUser');
    Route::post('posts/update/{id}',[PostController::class,'updatePost'] )->name('updatePost');
    Route::post('user/createPost',[PostController::class,'post'] )->name('post');

    // AuthController
    Route::post('user/userProfile',[AuthController::class,'post_userProfile'] )->name('post_userProfile');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');

    //ContactUsController
    Route::post('user/contactUs',[ContactUsController::class,'postContactUs'] )->name('postContactUs');

});


Route::group(['middleware'=>'admin'], function(){
     //AdminController
     Route::get('admin/contact_message/delete/{id}',[ContactUsController::class,'deleteMessage'] )->name('admin.deleteMessage');
     Route::get('admin/contact_message/edit/{id}',[ContactUsController::class,'editMessage'] )->name('admin.editMessage');
     Route::post('admin/contact_message/update/{id}',[ContactUsController::class,'updateMessage'] )->name('admin.updateMessage');
     Route::get('admin/index',[AdminController::class,'index'] )->name('admin.index');
     Route::get('admin/contact_message',[AdminController::class,'contact_message'] )->name('admin.contact_message');
     Route::get('admin/manage_premium_user',[AdminController::class,'manage_premium_user'] )->name('admin.manage_premium_user');
     Route::get('admin/manage_premium_user/delete/{id}',[AdminController::class,'deleteUser'] )->name('admin.deleteUser');
     Route::get('admin/manage_premium_user/edit/{id}',[AdminController::class,'editUser'] )->name('admin.editUser');
     Route::post('admin/manage_premium_user/update/{id}',[AdminController::class,'updateUser'] )->name('admin.updateUser');
});

