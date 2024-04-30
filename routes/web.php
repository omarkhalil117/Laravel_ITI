<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\student;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helloworld', function () {
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}' , function($id) {
    $users = [
        ['id'=>1 , 'name'=>'Omar'],
        ['id'=>2 , 'name'=>'Aya'],
        ['id'=>3 , 'name'=>'Ali'],
    ];

    return $users[$id-1];
})->where('id','[0-9]+');

Route::get('/students',[student::class,'home']);

Route::get('/users',[UserController::class,'index'])->name('users.index');

// Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

// Route::get("/posts/create", [PostController::class, 'create'])->name('posts.create');

// Route::get("/posts", [PostController::class, 'index'])->name('posts.index');

// Route::get("/posts/{id}", [PostController::class, 'show'])->name('posts.show');

// Route::get("/posts/edit/{id}", [PostController::class, 'edit'])->name('posts.edit');

// Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route::put('/posts/{id}', [PostController::class,'update'])->name('posts.update');

Route::resource('posts', PostController::class);