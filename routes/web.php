<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\student;
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