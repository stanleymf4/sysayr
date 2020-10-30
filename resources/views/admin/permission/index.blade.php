@extends("theme.$theme.layout")

@section('titulo')
Permisos
@endsection

@section('content')
<br />
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Permisos</h3>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover text-nowrap table-striped">
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
                <td></td>
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