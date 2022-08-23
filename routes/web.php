<?php

use App\Models\dept;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class,'index'])->name('home')->middleware('auth');

Route::middleware('auth')->prefix('admin')->group(function () {
  // emp route resouce
Route::resource('employes', EmpController::class);

// departements  route resouce
Route::resource('depts', DeptController::class);
});;

