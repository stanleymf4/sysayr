<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationUser;
use App\Models\Admin\Gtvrole;
use App\Models\Security\Gsbuser;
use Illuminate\Http\Request;

class GsbuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Gsbuser::orderBy('gsbuser_id')->get();
        return view('admin.user.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Gtvrole::orderBy('gtvrole_id')->pluck('gtvrole_desc', 'gtvrole_id')->toArray();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationUser $request)
    {
        $user = Gsbuser::create($request->all());
        $user->roles()->attach($request->rol_id);
        return redirect('admin/user')->with('message', 'Usuario creado con exito');
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
        $roles = Gtvrole::orderBy('gtvrole_id')->pluck('gtvrole_desc', 'gtvrole_id')->toArray();
        $data = Gsbuser::with('roles')->findOrFail($id);
        return view('admin.user.edit', compact('data', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationUser $request, $id)
    {
        Gsbuser::findOrFail($id)->update($request->all());
        return redirect('admin/user')->with('messages', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
