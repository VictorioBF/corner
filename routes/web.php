<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\UsersController;
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

// =#=#=#=#=#=  POSTS   =#=#=#=#=#=
// C
Route::post('/post/new', [PostsController::class, 'CAction'])->middleware('auth')->name('posts.new');
// R
Route::get('/', [PostsController::class, 'index'])->middleware('auth')->name('posts.home'); // Home
Route::get('/{post}', [PostsController::class, 'show'])->middleware('auth')->name('posts.show');
Route::get('/posts/{subject}', [PostsController::class, 'subject'])->middleware('auth')->name('posts.subject');
// D
Route::delete('/post/delete/{post}', [PostsController::class, 'DAction'])->middleware('auth')->name('posts.delete');

// =#=#=#=#=#= COMMENTS =#=#=#=#=#=
// C
Route::post('/comment/new', [CommentsController::class, 'CAction'])->middleware('auth')->name('comments.new');
// R
Route::get('comment/', [CommentsController::class, 'index'])->middleware('auth')->name('comments.get');
// D
Route::delete('/comment/delete/{comment}', [CommentsController::class, 'delete'])->middleware('auth')->name('comments.delete');

// =#=#=#=#=#= SUBJECTS =#=#=#=#=#=
// C
Route::get('/subjects/new', [SubjectsController::class, 'create'])->middleware('auth')->name('subjects.create');
Route::post('/subjects/new', [SubjectsController::class, 'insert'])->middleware('auth')->name('subjects.insert');
// R
Route::get('/subjects', [SubjectsController::class, 'index'])->middleware('auth')->name('subjects');
Route::get('/subjects/{subject}', [SubjectsController::class, 'show'])->middleware('auth')->name('subjects.show');
// U
Route::get('/subjects/edit/{subject}', [SubjectsController::class, 'edit'])->middleware('auth')->name('subjects.edit');
Route::put('/subjects/edit/{subject}', [SubjectsController::class, 'update'])->middleware('auth')->name('subjects.update');
// D
Route::get('/subjects/delete/{subject}', [SubjectsController::class, 'remove'])->middleware('auth')->name('subjects.remove');
Route::delete('/subjects/delete/{subject}', [SubjectsController::class, 'delete'])->middleware('auth')->name('subjects.delete');

// =#=#=#=#=#=  USERS   =#=#=#=#=#=
// C
Route::get('/users/new', [UsersController::class, 'register'])->name('users.register');
Route::post('/users/new', [UsersController::class, 'new'])->name('users.new');
// R
Route::get('/user/{user}', [UsersController::class, 'RView'])->middleware('auth')->name('users.profile');
// U
Route::get('/users/edit/{user}', [UsersController::class, 'UView'])->middleware('auth')->name('users.edit');
Route::put('/users/edit/{user}', [UsersController::class, 'UAction'])->middleware('auth')->name('users.update');
// D
Route::delete('/users/delete/{user}', [UsersController::class, 'DAction'])->middleware('auth')->name('users.delete');
// Log in/out
Route::get('/users/login', [UsersController::class, 'login'])->name('users.login');
Route::post('/users/login', [UsersController::class, 'login']);
Route::get('/users/logout', [UsersController::class, 'logout'])->name('users.logout');