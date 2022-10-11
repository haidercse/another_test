<?php

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
   return view('start');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/post',[PostController::class,'index'])->name('post.index')->middleware('auth');
Route::post('/post',[PostController::class,'store'])->name('post.store');
Route::post('/update/{id}',[PostController::class,'update'])->name('post.update');
Route::get('/details/{id}',[PostController::class,'postDetails'])->name('post.details');
Route::get('/list',[PostController::class,'list'])->name('user.list');
Route::post('/list',[PostController::class,'userStore'])->name('user.store');
Route::get('/get_all_comment',[PostController::class,'storeComment'])->name('get_all_comment');


require __DIR__.'/auth.php';
