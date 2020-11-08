@extends("theme.$theme.layout")

@section('titulo')
Menu - Rol
@endsection

@section('scripts')
<script src="{{ asset("assets/pages/scripts/admin/menu-rol/index.js") }}" type="text/javascript"></script>
@endsection

@section('content')
<br />
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      @include("includes.message")
      <div class="card card-primary card-outline">
        <div class="card-header with-border">
          <h3 class="card-title">Menús - Rol</h3>
        </div>
        <div class="card-body">
          @csrf
          <table class="table table-bordered table-hover text-nowrap table-striped" id="tabla-data">
            <thead>
              <tr>
                <th>Menú</th>
                @foreach ($roles as $id => $nombre)
                <th>{{$nombre}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $key => $menu)
              @if ($menu['gsbmenu_parent_id'] != 0)
              @break
              @endif
              <tr>
                <td class="font-weight-bold"><i class="fa fa-arrows-alt"></i>{{$menu["gsbmenu_name"]}}</td>
                @foreach ($roles as $id => $nombre)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol[]" class="menu_rol" data-menuid={{$menu["gsbmenu_id"]}}
                    value="{{$id}}"
                    {{in_array($id, array_column($menuRoles[$menu["gsbmenu_id"]], "gtvrole_id")) ? "checked" : "" }}>
                </td>
                @endforeach
              </tr>
              @foreach ($menu["submenu"] as $key => $son)
              <tr>
                <td class="pl-20"><i class="fa fa-arrow-right"></i>{{ $son["gsbmenu_name"]}}</td>
                @foreach ($roles as $id => $nombre)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol[]" class="menu_rol" data-menuid={{$son["gsbmenu_id"]}}
                    value="{{$id}}"
                    {{in_array($id, array_column($menuRoles[$son["gsbmenu_id"]], "gtvrole_id")) ? "checked" : "" }}>
                </td>
                @endforeach
              </tr>
              @foreach ($son["submenu"] as $key => $son2)
              <tr>
                <td class="pl-30"><i class="fa fa-arrow-right"></i>{{ $son2["gsbmenu_name"]}}</td>
                @foreach ($roles as $id => $nombre)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol[]" class="menu_rol" data-menuid={{$son2["gsbmenu_id"]}}
                    value="{{$id}}"
                    {{in_array($id, array_column($menuRoles[$son2["gsbmenu_id"]], "gtvrole_id")) ? "checked" : "" }}>
                </td>
                @endforeach
              </tr>
              @foreach ($son2["submenu"] as $key => $son3)
              <tr>
                <td class="pl-40"><i class="fa fa-arrow-right"></i>{{ $son3["gsbmenu_name"]}}</td>
                @foreach ($roles as $id => $nombre)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol[]" class="menu_rol" data-menuid={{$son3["gsbmenu_id"]}}
                    value="{{$id}}"
                    {{in_array($id, array_column($menuRoles[$son3["gsbmenu_id"]], "gtvrole_id")) ? "checked" : "" }}>
                </td>
                @endforeach
              </tr>
              @foreach ($son3["submenu"] as $key => $son4)
              <tr>
                <td class="pl-50"><i class="fa fa-arrow-right"></i>{{ $son4["gsbmenu_name"]}}</td>
                @foreach ($roles as $id => $nombre)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol[]" class="menu_rol" data-menuid={{$son4["gsbmenu_id"]}}
                    value="{{$id}}"
                    {{in_array($id, array_column($menuRoles[$son4["gsbmenu_id"]], "gtvrole_id")) ? "checked" : "" }}>
                </td>
                @endforeach
              </tr>
              @endforeach
              @endforeach
              @endforeach
              @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection