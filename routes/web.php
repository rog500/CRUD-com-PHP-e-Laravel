<?php

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

use App\Categoria;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/','PagesControl@home');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('categoria','CategoriaController')->middleware('auth');//->name('index','categoria');//Definindo a rota do controller
Route::resource('despesa','DespesaController')->middleware('auth');//->name('index','despesa');//Definindo a rota do controller

Route::get('/home', 'HomeController@index')->name('home');
