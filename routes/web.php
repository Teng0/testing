<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\UploadedFile;


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


Route::get('/user',"UserController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post("/upload",'UserController@uploadAvatar');


    Route::get('/todos', "TodoController@index")->name("todo.index");
    Route::get('/todos/create', "TodoController@create");
    Route::post('/todos/create', "TodoController@store");
    Route::patch('/todos/{todo}/update', "TodoController@update")->name('todo.update');
    Route::get('/todos/{todo}/edit', "TodoController@edit");
    Route::put('/todos/{todo}/complete', "TodoController@complete")->name('todo.complete');
    Route::get('/todos/{todo}/show', "TodoController@show")->name('todo.show');

//Route::resource("/todos","TodoController");


    Route::delete('/todos/{todo}/incomplete', "TodoController@incomplete")->name('todo.incomplete');
    Route::delete('/todos/{todo}/delete', "TodoController@delete")->name('todo.delete');


