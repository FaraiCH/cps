<?php
use App\Http\Controllers\Community\PostsController;
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

Route::get('/','WelcomeController@index')->name('welcome');

Route::get('/community/posts/{post}', [PostsController::class, 'show'])->name('community.show');
Route::get('community/categories/{category}', [PostsController::class, 'category'])->name('community.category');
Route::get('community/tags/{tag}', [PostsController::class, 'tag'])->name('community.tag');

Auth::routes();



Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoriesController');

    Route::resource('posts', 'PostsController');
    Route::get('posts?id={post}', 'PostsController@user_post')->name('posts.first');

    Route::resource('tags', 'TagsController');

    Route::get('suspended', 'UsersController@suspend')->name('suspended.index');
    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');

    Route::put('restore-post{post}', 'PostsController@restore')->name('restore-posts.index');

    Route::resource('achieves', 'AchievesController');
    Route::get('get-achieves', 'AchievesController@index');

    Route::resource('primes', 'PrimeUsersController' );


Route::middleware(['auth','admin'])->group(function (){
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('user/profile', 'UsersController@update')->name('users.update-profile');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'USersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/make-writer', 'USersController@makeWriter')->name('users.make-writer');
    Route::post('primes/{user}/make-member', 'PrimeUsersController@makeMember')->name('primes.make-member');



});
});