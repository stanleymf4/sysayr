@extends("theme.$theme.layout")
@section('titulo')
Usuarios
@endsection

@section('scripts')
<script src="{{ asset("assets/pages/scripts/admin/index.js") }}" type="text/javascript"></script>
@endsection

@section('content')
<br />
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      @include("includes.message")
      <div class="card card-secondary card-outline">
        <div class="card-header with-border">
          <h3 class="card-title">Usuarios</h3>
          <div class="card-tools pull-right">
            <a href="{{route('createUser')}}" class="btn btn-block btn-success btn-dm">
              <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
            </a>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover text-nowrap table-striped" id="tabla-data">
            <thead>
              <tr>
                <th>Usuarios</th>
                <th>Nombre</th>
                <th>Email</th>
                <th class="width70"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                <td>{{$data->gsbuser_login}}</td>
                <td>{{$data->gsbuser_name}}</td>
                <td>{{$data->gsbuser_email}}</td>
                <td>
                  <a href="{{route('editUser', ['id' => $data->gsbuser_id])}}" class="btn-accion-tabla tooltipsC"
                    title="Editar este registro">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form action="{{route('deleteUser', ['id' => $data->gsbuser_id])}}" class=" d-inline form-eliminar"
                    method="post">
                    @csrf @method("delete")
                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                      <i class="fa fa-fw fa-trash text-danger"></i>
                    </button>
                  </form>
                </td>
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