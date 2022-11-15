<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Accounts\AccountsIndexController;
use App\Http\Controllers\Api\Posts\{PostsDestroyController, PostsIndexController, PostsShowController, PostsStoreController, PostsUpdateController};
use App\Http\Controllers\Api\Users\{UsersDestroyController, UsersIndexController, UsersShowController, UsersStoreController, UsersUpdateController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum', 'cache.headers:public;max_age=60;etag', 'treblle'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', UsersIndexController::class)->name('users.index');
//        Route::post('/', UsersStoreController::class)->name('users.store');
        Route::get('/{user}', UsersShowController::class)->name('users.show');
        Route::match(['put', 'patch'], '/{user}', UsersUpdateController::class)->name('users.update');
        Route::delete('/{user}', UsersDestroyController::class)->name('users.destroy');
    });

    Route::prefix('posts')->group(function () {
        Route::get('/', PostsIndexController::class)->name('posts.index');
        Route::post('/', PostsStoreController::class)->name('posts.store');
        Route::get('/{post}', PostsShowController::class)->name('posts.show');
        Route::match(['put', 'patch'], '/{post}', PostsUpdateController::class)->name('posts.update');
        Route::delete('/{post}', PostsDestroyController::class)->name('posts.destroy');
    });

    Route::prefix('account')->group(function () {
        Route::get('/', AccountsIndexController::class)->name('account.index');
    });
});
