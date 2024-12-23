<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('posts', [PostController::class, 'getAllPosts']);
Route::get('post/{post_id}', [PostController::class, 'singlePost']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);

    // blog api endpoints

    // posts
    Route::post('add/post', [PostController::class, 'addNewPost']);
    Route::post('edit/post',[PostController::class, 'editPost']);
    Route::post('delete/post/{post_id}', [PostController::class, 'deletePost']);

    // comments
    Route::post('comment', [CommentController::class, 'postComment']);

    // likes
    Route::post('like', [LikeController::class, 'likePost']);

});

