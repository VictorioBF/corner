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
Route::post('/post/new', [PostsController::class, 'new'])->name('posts.new');
// R
Route::get('/', [PostsController::class, 'index'])->name('home'); // Home
Route::get('/{post}', [PostsController::class, 'show'])->name('posts.show');
// D
Route::delete('/post/delete/{post}', [PostsController::class, 'delete'])->name('posts.delete');

// =#=#=#=#=#= COMMENTS =#=#=#=#=#=
// C
Route::post('/comment/new', [CommentsController::class, 'new'])->name('comments.new');
// R
Route::get('comment/', [CommentsController::class, 'index'])->name('comments.get');
// D
Route::delete('/comment/delete/{comment}', [CommentsController::class, 'delete'])->name('comments.delete');

// =#=#=#=#=#= SUBJECTS =#=#=#=#=#=
// C
Route::get('/subjects/new', [SubjectsController::class, 'create'])->name('subjects.create');
Route::post('/subjects/new', [SubjectsController::class, 'insert'])->name('subjects.insert');
// R
Route::get('subjects', [SubjectsController::class, 'index'])->name('subjects');
Route::get('/subjects/{subject}', [SubjectsController::class, 'show'])->name('subjects.show');
// U
Route::get('/subjects/edit/{subject}', [SubjectsController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/edit/{subject}', [SubjectsController::class, 'update'])->name('subjects.update');
// D
Route::get('/subjects/delete/{subject}', [SubjectsController::class, 'remove'])->name('subjects.remove');
Route::delete('/subjects/delete/{subject}', [SubjectsController::class, 'delete'])->name('subjects.delete');

// =#=#=#=#=#=  USERS   =#=#=#=#=#=
// C
Route::post('/users/new', [UsersController::class, 'new'])->name('users.new');
// U
Route::put('/users/edit/{user}', [UsersController::class, 'update'])->name('users.update');
// D
Route::delete('/users/delete/{user}', [UsersController::class, 'delete'])->name('users.delete');