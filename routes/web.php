<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/{id}',[CategoryController::class, 'show'])->name('category.show');

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('post.show');

Route::post('/comments', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/comments/delete/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});