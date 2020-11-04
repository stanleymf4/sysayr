@extends("theme.$theme.layout")
@section('titulo')
Roles
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><u>Listado de Roles</u></h3>
          <div class="card-tools pull-right">
            <a href="{{route('createRole')}}" class="btn btn-block btn-success btn-dm">
              <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
            </a>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover text-nowrap table-striped" id="tabla-data">
            <thead>
              <tr>
                <th>Nombre</th>
                <th class="width70"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                <td>{{$data->gtvrole_desc}}</td>
                <td>
                  <a href="{{route('editRole', ['id' => $data->gtvrole_id])}}" class="btn-accion-tabla tooltipsC"
                    title="Editar este registro">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form action="{{route('deleteRole', ['id' => $data->gtvrole_id])}}" class=" d-inline form-eliminar"
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