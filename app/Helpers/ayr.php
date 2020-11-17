<?php

use App\Models\Admin\Gtvpmss;
use Illuminate\Support\Facades\Cache;

if (!function_exists('getMenuActivo')) {
  function getMenuActivo($route)
  {
    if (request()->is($route) || request()->is($route . '/*')) {
      return ' active ';
    } else {
      return '';
    }
  }
}

if (!function_exists('canUser')) {
  function can($permission, $redirect = true)
  {
    if (session()->get('rol_name') == 'xx') {
      return true;
    } else {
      $rolId = session()->get('rol_id');
      /* //$permissions = cache()->tags('Permission')->rememberForever("Permission.rolid.$rolId", function () { */
      $permissions = Cache::rememberForever("permission.rolid.$rolId", function () {
        return Gtvpmss::whereHas('roles', function ($query) {
          $query->where('gsbpmrl_role_id', session()->get('rol_id'));
        })->get()->pluck('gtvpmss_slug')->toArray();
      });
      if (!in_array($permission, $permissions)) {
        if ($redirect) {
          if (!request()->ajax()) {
            return redirect()->route('start')->with('message', 'No tiene permisos para acceder a esta funcionalidad')->send();
          } else {
            abort(403, 'No tiene permisos');
          }
        } else {
          return false;
        }
      }
      return false;
    }
  }
}
