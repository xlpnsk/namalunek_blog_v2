<?php

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
use App\Http\Controllers\PostsController;
Route::get('/', [PostsController::class, 'index'])->name('/');

Route::get('/post/{id}', [App\Http\Controllers\CommentsController::class, 'show_postAndComments'])->name('show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\CommentsController::class, 'get_users_ComsAndPosts'])->name('home');

Route::get('/createpost', [PostsController::class, 'create'])->name('createpost');
Route::post('/createpost', [PostsController::class, 'store'])->name('storepost');

Route::get('/deletepost/{id}', [PostsController::class, 'destroy'])->name('deletepost');

Route::get('/editpost/{id}', [PostsController::class, 'edit'])->name('editpost');
Route::put('{id}', [PostsController::class, 'update'])->name('updatepost');

Route::post('/createcomment/{id}', [App\Http\Controllers\CommentsController::class, 'storecomm'])->name('createcomment');

Route::get('/deletecomment/{id}', [App\Http\Controllers\CommentsController::class, 'destroy'])->name('deletecomment');

Route::get('/editcomment/{id}', [App\Http\Controllers\CommentsController::class, 'edit'])->name('editcomment');
Route::put('/updatecomment/{id}', [App\Http\Controllers\CommentsController::class, 'update'])->name('updatecomment');

Route::get('/edituser/{id}/{action}', [App\Http\Controllers\UsersController::class, 'edit'])->name('edituser');

Route::post('{id}/{action}', [App\Http\Controllers\UsersController::class, 'update'])->name('updateuser');

Route::get('/deleteuser/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('deleteuser');

Route::get('/admin', [App\Http\Controllers\UsersController::class, 'index'])->name('admin');

Route::put('/changerole/{id}', [App\Http\Controllers\UsersController::class, 'changerole'])->name('changerole');

Route::get('/admin/content', [App\Http\Controllers\CommentsController::class, 'index'])->name('admincontent');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
