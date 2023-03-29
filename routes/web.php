<?php

use App\Http\Controllers\Articles\ArticleController;
use App\Http\Controllers\Publishers\PublisherController;
use App\Http\Controllers\Publishers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'Filter']);
Route::get('/home/profile/id={id}&username={username}', [App\Http\Controllers\Publishers\ProfileController::class, 'show'])->name('profile');

/**
 * Regular user routes
 *
 */
Route::controller(ArticleController::class)->group(function(){

    /**
     * Show all the articles
     *
     */
    Route::get('/index/articles', 'index')->name('articles');

    /**
     * Show a specific article
     *
     */
    Route::get('/index/articles/id={id}&title={title}&username={username}', 'show')->name('article');

    /**
     * Show a publisher by his ID
     *
     */
    Route::get('/index/publishers/id={id}&username={username}', 'publisher')->name('publishers');
});

Route::controller(PublisherController::class)->group(function(){

    /**
     * Show all the publishers
     *
     */
    Route::get('/home/publisher/id={id}&username={username}', 'show')->name('publisher');

    /**
     * Create an article
     *
     */
    Route::get('/home/article/add', 'create')->name('create');

    /**
     * Save an article
     *
     */
    Route::post('/home/article/add', 'store');

    /**
     * Update an article view
     * 
     */
    Route::get('/home/article/update/id={id}&title={title}&username={username}', 'edit')->name('edit');

    /**
     * Update an existing article
     * 
     */
    Route::put('/home/article/update/id={id}&title={title}&username={username}', 'update');

    /**
     * Preview an article
     *
     */
    Route::get('/home/preview/id={id}&title={title}&username={username}', 'preview')->name('preview');

    /**
     * Delete an article
     *
     */
    Route::delete('/home/profile/id={id}&title={title}&username={username}', 'destroy')->name('delete');

    /**
     * Like an article
     * 
     */
    Route::put('/home/preview/id={id}&title={title}&username={username}','like')->name('like');

    /**
     * profile
     * 
     */
    Route::get('/home/update-profile', 'showprofile')->name('showprofile');
    Route::post('/home/update-profile', 'createprofile');

    route::get('/home/card-profile/id={id}&username={username}', 'card')->name('card-profile');

    Route::delete('/home/profile/update/{id}', 'delAccount')->name('delAccount');
    
    Route::get('/home/profile/settings/id={id}&username={username}', 'settings')->name('settings');
    Route::get('/home/profile/settings/set-profile-details/id={id}&username={username}', 'profileSettings')->name('profileSettings');
    Route::put('/home/profile/settings/set-profile-details/id={id}&username={username}', 'updateProfileSettings');

    Route::get('/home/profile/settings/set-personal-details/id={id}&username={username}', 'personalSettings')->name('personalSettings');
    Route::put('/home/profile/settings/set-personal-details/id={id}&username={username}', 'updatePersonalSettings');
});
