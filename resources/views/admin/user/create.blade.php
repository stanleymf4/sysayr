@extends("theme.$theme.layout")

@section('titulo')
Usuarios
@endsection

@section('scripts')
<script src="{{ asset("assets/pages/scripts/admin/user/create.js") }}" type="text/javascript"></script>
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
          <h3 class="card-title">Crear Usuario</h3>
          <div class="card-tools pull-right">
            <a href="{{route('user')}}" class="btn btn-block btn-info btn-dm">
              <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
          </div>
        </div>
        <form action="{{ route('storeUser') }}" id="form-general" class="form-horizontal" method="POST"
          autocomplete="off">
          @csrf
          <div class="card-body">
            @include('admin.user.form')
          </div>
          <div class="card-footer">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              @include('includes.button-form-create')
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection