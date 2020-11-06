<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gsbmenu;
use App\Models\Admin\Gtvrole;
use Illuminate\Http\Request;

class GsbmerlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Gtvrole::orderBy('gtvrole_id')->pluck('gtvrole_desc', 'gtvrole_id')->toArray();
        $menus = Gsbmenu::getMenu();
        $menuRoles = Gsbmenu::with('roles')->get()->pluck('roles', 'gsbmenu_id')->toArray();
        /* dd($menuRoles); */
        return view('admin.menu-role.index', compact('roles', 'menus', 'menuRoles'));
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
            $menus = new Gsbmenu();
            if ($request->input('estado') == 1) {
                $menus->find($request->input('menu_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['response' => 'El rol se asignó correctamente']);
            } else {
                $menus->find($request->input('menu_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['response' => 'El rol se eliminó correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
