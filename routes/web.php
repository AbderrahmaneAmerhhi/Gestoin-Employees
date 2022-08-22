<?php

use App\Http\Controllers\DeptController;
use App\Http\Controllers\EmpController;
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
    return view('home');
})->name('home');

Route::middleware('auth')->prefix('admin')->group(function () {
  // emp route resouce
Route::resource('employes', EmpController::class);

// departements  route resouce
Route::resource('depts', DeptController::class);
});;

