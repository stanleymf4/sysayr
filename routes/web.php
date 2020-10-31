<?php

use App\Http\Controllers\Admin\GsbmenuController;
use App\Http\Controllers\Admin\GtvpmssController;
use App\Http\Controllers\StartController;
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

Route::get('/', [StartController::class, 'index']);
Route::get('admin/permission', [GtvpmssController::class, 'index'])->name('listaPermiso');
Route::get('admin/permission/create', [GtvpmssController::class, 'create'])->name('crearpermiso');
Route::get('admin/menu/create', [GsbmenuController::class, 'create'])->name('createMenu');
Route::get('admin/menu/', [GsbmenuController::class, 'index'])->name('listaMenu');
Route::post('admin/menu/store', [GsbmenuController::class, 'store'])->name('storeMenu');
