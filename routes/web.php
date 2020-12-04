<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatusController;

/**
 * Home
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Authentication
 */
Route::get('/signup', [AuthController::class, 'getSignup'])->name('auth.signup');
Route::post('/signup', [AuthController::class, 'postSignup']);

Route::get('/signin', [AuthController::class, 'getSignin'])->name('auth.signin');
Route::post('/signin', [AuthController::class, 'postSignin']);

Route::get('/signout', [AuthController::class, 'getSignout'])->name('auth.signout');

/**
 * Search
 */
Route::get('/search', [SearchController::class, 'index'])->name('search.results');

/**
 * User Profile
 */
Route::group(['prefix' => '/profile'], function () {
    Route::get('/{user:username}', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/edit/{user:username}', [ProfileController::class, 'getEdit'])->name('profile.edit');
    Route::post('/edit/{user:username}', [ProfileController::class, 'postEdit']);
});

/**
 * Friends
 */
Route::get('/friends', [FriendController::class, 'index'])->name('friends.index');
Route::get('/friends/add/{user:username}', [FriendController::class, 'getAdd'])->name('friend.add');
Route::get('/friends/accept/{user:username}', [FriendController::class, 'getAccept'])->name('friend.accept');

Route::delete('/friends/remove/{user:username}', [FriendController::class, 'postRemove'])->name('friend.remove');

/**
 * Statuses
 */
Route::post('/status', [StatusController::class, 'postStatus'])->name('status.post');
Route::post('/status/reply/{status}', [StatusController::class, 'postReply'])->name('status.reply');

Route::get('/status/like/{status}', [StatusController::class, 'getLike'])->name('status.like');
