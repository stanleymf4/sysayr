<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GsbmenuController;
use App\Http\Controllers\Admin\GsbmerlController;
use App\Http\Controllers\Admin\GtvpmssController;
use App\Http\Controllers\Admin\GtvroleController;
use App\Http\Controllers\Security\LoginController;
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

Route::get('/', [StartController::class, 'index'])->name('start');
Route::get('security/login', [LoginController::class, 'index'])->name('login');
Route::post('security/login', [LoginController::class, 'login'])->name('login-post');
Route::get('security/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {
  Route::get('', [AdminController::class, 'index']);
  Route::get('permission', [GtvpmssController::class, 'index'])->name('listaPermiso');
  Route::get('permission/create', [GtvpmssController::class, 'create'])->name('crearpermiso');

  /* RUTAS DEL MENU */
  Route::get('menu', [GsbmenuController::class, 'index'])->name('menu');
  Route::get('menu/create', [GsbmenuController::class, 'create'])->name('createMenu');
  Route::post('menu/store', [GsbmenuController::class, 'store'])->name('storeMenu');
  Route::post('menu/storeOrder', [GsbmenuController::class, 'storeOrder'])->name('storeOrder');

  /* RUTAS ROLES */
  Route::get('role', [GtvroleController::class, 'index'])->name('roles');
  Route::get('role/create', [GtvroleController::class, 'create'])->name('createRole');
  Route::get('role/{id}/edit', [GtvroleController::class, 'edit'])->name('editRole');
  Route::post('role/store', [GtvroleController::class, 'store'])->name('storeRole');
  Route::put('role/{id}', [GtvroleController::class, 'update'])->name('updateRole');
  Route::delete('role/{id}', [GtvroleController::class, 'destroy'])->name('deleteRole');

  /*RUTAS MENU ROL*/
  Route::get('menu-role', [GsbmerlController::class, 'index'])->name('menuRole');
  Route::post('menu-role', [GsbmerlController::class, 'store'])->name('storeMenuRole');
});
