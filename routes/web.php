<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::resource('/users', UserController::class)->names('users');
Route::get('export-Excel', [UserController::class,'exportExcel'])->name('export-Excel');
Route::get('export-PDF', [UserController::class,'exportPDF'])->name('export-PDF');

#Route::get('exportar_usuarios', [UsersController::class,'export'])->name('exportar_usuarios');
#Route::get('/exportar_usuarios' , '\App\Http\Controllers\UserController@exportExcel' );



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
