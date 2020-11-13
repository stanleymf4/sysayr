<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationMenu;
use App\Models\Admin\Gsbmenu;
use Illuminate\Http\Request;

class GsbmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar');
        $menus = Gsbmenu::getMenu();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationMenu $request)
    {
        Gsbmenu::create($request->all());
        return redirect('admin/menu/create')->with('message', 'Menú creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Gsbmenu::findOrFail($id);
        return view('admin.menu.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationMenu $request, $id)
    {

        Gsbmenu::findOrFail($id)->update($request->all());
        return redirect('admin/menu')->with('message', 'Menú actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gsbmenu::destroy($id);
        return redirect('admin/menu')->with('message', 'Menú eliminado con exito');
    }

    public function storeOrder(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Gsbmenu();
            $menu->storeOrder($request->menu);
            return response()->json(['answer' => 'ok']);
        } else {
            abort(404);
        }
    }
}
