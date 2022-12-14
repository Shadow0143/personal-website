<?php

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/edit-section', [App\Http\Controllers\HomeController::class, 'editSection'])->name('editSection');
Route::get('/post-details/{id}', [App\Http\Controllers\HomeController::class, 'postDetails'])->name('postDetails');
Route::get('/biography-details', [App\Http\Controllers\HomeController::class, 'biographyDetails'])->name('biographyDetails');

Route::get('/{authername}/type/{type}', [App\Http\Controllers\HomeController::class, 'filterByposts'])->name('filterByposts');
Route::get('/{authername}/tag/{type}', [App\Http\Controllers\HomeController::class, 'filterByTag'])->name('filterByTag');
Route::get('/{authername}/category/{type}', [App\Http\Controllers\HomeController::class, 'filterByCategory'])->name('filterByCategory');

Route::get('/delete-post', [App\Http\Controllers\HomeController::class, 'deletePost'])->name('deletePost');




Route::get('/post-likes', [App\Http\Controllers\HomeController::class, 'likes'])->name('likes');
Route::get('/blogs', [App\Http\Controllers\BlogsController::class, 'index'])->name('blogs');
Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\admin\DashboardContoller::class, 'dashboard'])->name('dashboard');
Route::get('/html-editor', [App\Http\Controllers\admin\DashboardContoller::class, 'htmlEditor'])->name('htmlEditor');
Route::post('/create-section', [App\Http\Controllers\admin\SectionContoller::class, 'createSection'])->name('createSection');
Route::post('/create-post', [App\Http\Controllers\admin\PostController::class, 'createPost'])->name('createPost');
Route::post('/create-section-item', [App\Http\Controllers\admin\SectionContoller::class, 'createSectionItem'])->name('createSectionItem');
Route::get('/edit-section-api', [App\Http\Controllers\admin\ApiContoller::class, 'editSectionApi'])->name('editSectionApi');

Route::get('/auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('/auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');


Route::post('/send-comment', [App\Http\Controllers\CommentController::class, 'sendComment'])->name('sendComment');
Route::get('/delete-comment', [App\Http\Controllers\CommentController::class, 'deletesComment'])->name('deletesComment');
Route::post('/send-reply', [App\Http\Controllers\CommentController::class, 'sendReply'])->name('sendReply');

