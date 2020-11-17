<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gtvpmss;
use App\Models\Admin\Gtvrole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PermissionRole extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Gtvrole::orderBy('gtvrole_id')->pluck('gtvrole_desc', 'gtvrole_id')->toArray();
        $permissions = Gtvpmss::get();
        $permissionRoles = Gtvpmss::with('roles')->get()->pluck('roles', 'gtvpmss_id')->toArray();
        return view('admin.permission-role.index', compact('roles', 'permissions', 'permissionRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            Cache::forget('permission.rolid.' . $request->input('rol_id'));
            $permission = new Gtvpmss();
            if ($request->input('estado') == 1) {
                $permission->find($request->input('permiso_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['response' => 'El rol se asignó correctamente']);
            } else {
                $permission->find($request->input('permiso_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['response' => 'El rol se eliminó correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
