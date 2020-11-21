<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TweetLikesController;


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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function(){
    Route::get('/tweets', [TweetController::class, 'index'])->name('home');

    Route::post('/tweets/{tweet}/like', [TweetLikesController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [TweetLikesController::class, 'destroy']);

    Route::post('/tweets', [TweetController::class, 'store']);
    Route::post('/profiles/{user:name}/follow', [FollowsController::class, 'store']);
    Route::get('/profiles/{user:name}/edit', [ProfilesController::class, 'edit']);
    Route::patch('/profiles/{user:name}/edit', [ProfilesController::class, 'update']);
    Route::get('/explore', [ExploreController::class, 'index']);

});

Route::get('/profiles/{user:name}', [ProfilesController::class, 'show'])->name('profile');


