@extends("theme.$theme.layout")

@section('titulo')
Permiso - Rol
@endsection

@section('scripts')
<script src="{{ asset("assets/pages/scripts/admin/permission-role/index.js") }}" type="text/javascript"></script>
@endsection

@section('content')
<br />
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      @include("includes.message")
      <div class="card card-primary card-outline">
        <div class="card-header with-border">
          <h3 class="card-title">Permiso - Rol</h3>
        </div>
        <div class="card-body">
          @csrf
          <table class="table table-bordered table-hover text-nowrap table-striped" id="tabla-data">
            <thead>
              <tr>
                <th>Permiso</th>
                @foreach ($roles as $id => $nombre)
                <th>{{$nombre}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($permissions as $key => $permission)
              <tr>
                <td class="font-weight-bold">{{$permission["gtvpmss_desc"]}}</td>
                @foreach ($roles as $id => $nombre)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol[]" class="permiso_rol"
                    data-permisoid={{$permission["gtvpmss_id"]}} value="{{$id}}"
                    {{in_array($id, array_column($permissionRoles[$permission["gtvpmss_id"]], "gtvrole_id")) ? "checked" : "" }}>
                </td>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection