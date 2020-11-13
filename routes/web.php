<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GsbmenuController;
use App\Http\Controllers\Admin\GsbmerlController;
use App\Http\Controllers\Admin\GtvpmssController;
use App\Http\Controllers\Admin\GtvroleController;
use App\Http\Controllers\Admin\PermissionRole;
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
  /* RUTAS DE PERMISO */
  Route::get('permission', [GtvpmssController::class, 'index'])->name('permission');
  /* Route::get('permission', [GtvpmssController::class, 'index'])->name('listPermiso'); */
  Route::get('permission/create', [GtvpmssController::class, 'create'])->name('createPermission');
  Route::post('permission', [GtvpmssController::class, 'store'])->name('storePermission');
  Route::get('permission/{id}/edit', [GtvpmssController::class, 'edit'])->name('editPermission');
  Route::put('permission/{id}', [GtvpmssController::class, 'update'])->name('updatePermission');
  Route::delete('permission/{id}', [GtvpmssController::class, 'destroy'])->name('deletePermission');

  /* RUTAS DEL MENU */
  Route::get('menu', [GsbmenuController::class, 'index'])->name('menu');
  Route::get('menu/create', [GsbmenuController::class, 'create'])->name('createMenu');
  Route::post('menu/store', [GsbmenuController::class, 'store'])->name('storeMenu');
  Route::get('menu/{id}/editar', [GsbmenuController::class, 'edit'])->name('editMenu');
  Route::put('menu/{id}', [GsbmenuController::class, 'update'])->name('updateMenu');
  Route::get('menu/{id}/delete', [GsbmenuController::class, 'destroy'])->name('deleteMenu');
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

  /*RUTAS PERMISO ROL*/
  Route::get('permission-role', [PermissionRole::class, 'index'])->name('permissionRole');
  Route::post('permission-role', [PermissionRole::class, 'store'])->name('storePermissionRole');
});
