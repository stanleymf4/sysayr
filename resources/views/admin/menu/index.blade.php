@extends("theme.$theme.layout")

@section('titulo')
Menú
@endsection

@section('styles')
<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section('scriptsPlugins')
<script src="{{ asset("assets/js/jquery-nestable/jquery.nestable.js") }}" type="text/javascript"></script>
@endsection

@section('scripts')
<script src="{{ asset("assets/pages/scripts/admin/menu/index.js") }}" type="text/javascript"></script>
@endsection

@section('content')
<br />
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      @include("includes.message")
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Menús - Cuatro Niveles</h3>
        </div>
        <div class="card-body">
          @csrf
          <div class="dd" id="nestable">
            <ol class="dd-list">
              @foreach ($menus as $key => $item)
              @if ($item["gsbmenu_parent_id"] != 0)
              @break
              @endif
              @include("admin.menu.menu-item", ["item" => $item])
              @endforeach
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection