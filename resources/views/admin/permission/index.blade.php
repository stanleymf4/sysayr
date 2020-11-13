@extends("theme.$theme.layout")

@section('titulo')
Permisos
@endsection

@section('scripts')
<script src="{{ asset("assets/pages/scripts/admin/index.js") }}" type="text/javascript"></script>
@endsection

@section('content')
<br />
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      @include('includes.form-error')
      @include('includes.message')
      <div class="card card-secondary card-outline">
        <div class="card-header with-border">
          <h3 class="card-title">Permisos</h3>
          <div class="card-tools pull-right">
            <a href="{{route('createPermission')}}" class="btn btn-block btn-success btn-dm">
              <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
            </a>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover text-nowrap table-striped" id="tabla-data">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($permissions as $permission)
              <tr>
                <td>{{$permission->gtvpmss_id}}</td>
                <td>{{$permission->gtvpmss_desc}}</td>
                <td>{{$permission->gtvpmss_slug}}</td>
                <td>
                  <a href="{{route('editPermission', ['id' => $permission->gtvpmss_id])}}"
                    class="btn-accion-tabla tooltipsC" title="Editar este registro">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form action="{{route('deletePermission', ['id' => $permission->gtvpmss_id])}}"
                    class=" d-inline form-eliminar" method="post">
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