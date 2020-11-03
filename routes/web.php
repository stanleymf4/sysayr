<?php

use App\Http\Controllers\Admin\GsbmenuController;
use App\Http\Controllers\Admin\GtvpmssController;
use App\Http\Controllers\Admin\GtvroleController;
use App\Http\Controllers\StartController;
use App\Models\Admin\Gsbmenu;
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

/* RUTAS DEL MENU */
Route::get('admin/menu', [GsbmenuController::class, 'index'])->name('menu');
Route::get('admin/menu/create', [GsbmenuController::class, 'create'])->name('createMenu');
Route::post('admin/menu/store', [GsbmenuController::class, 'store'])->name('storeMenu');
Route::post('admin/menu/storeOrder', [GsbmenuController::class, 'storeOrder'])->name('storeOrder');

/* RUTAS ROLES */
Route::get('admin/role', [GtvroleController::class, 'index'])->name('roles');
Route::get('admin/role/create', [GtvroleController::class, 'create'])->name('createRole');
Route::get('admin/role/{id}/edit', [GtvroleController::class, 'edit'])->name('editRole');
Route::post('admin/role/store', [GtvroleController::class, 'store'])->name('storeRole');
Route::put('admin/role/{id}', [GtvroleController::class, 'update'])->name('updateRole');
