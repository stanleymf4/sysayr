@extends("theme.$theme.layout")

@section('titulo')
Permisos
@endsection

@section('scripts')
<script src="{{ asset("assets/pages/scripts/admin/permission/create.js") }}" type="text/javascript"></script>
@endsection

@section('content')
<br />
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      @include('includes.form-error')
      @include('includes.message')
      <div class="card card-primary card-outline">
        <div class="card-header with-border">
          <h3 class="card-title">Editar Permisos {{$data->gtvpmss_desc}}</h3>
          <div class="card-tools pull-right">
            <a href="{{route('permission')}}" class="btn btn-block btn-info btn-dm">
              <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('updatePermission', ['id' => $data->gtvpmss_id]) }}" id="form-general"
            class="form-horizontal" method="post" autocomplete="off">
            @csrf @method("put")
            <div class="card-body">
              @include('admin.permission.form')
            </div>
            <div class="card-footer">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                @include('includes.button-form-edit')
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection