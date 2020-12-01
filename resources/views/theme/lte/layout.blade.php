<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>"@yield('titulo','Admisiones y Registro')"</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/adminlte.min.css") }}">
  <!--Modal style -->
  <link href="{{asset("assets/js/sweetalert2/sweetalert.css")}}" rel="stylesheet">
  <!--Notificaciones style-->
  <link href="{{asset("assets/js/toastr/toastr.min.css")}}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @yield("styles")

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/adminlte.min.css") }}">

  <link href="{{asset("assets/css/custom.css")}}" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Start Header -->
    @include("theme/$theme/header")
    <!-- End Header -->
    @include("theme/$theme/aside")
    <!-- Start Aside -->
    <!-- End Aside -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content">
        @yield("content")
      </section>
    </div>
    <!-- Start Footer -->
    @include("theme/$theme/footer")
    <!-- End Footer -->
    <!-- Inicio de ventana modal para login con mas de un rol -->
    @if (session()->get("roles") && count(session()->get("roles")) > 1)
    @csrf
    <div class="modal fade" id="modal-seleccionar-rol" data-rol-set="{{empty(session()->get("rol_id")) ? 'NO' : 'SI'}}"
      tabindex="-1" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Roles de Usuario</h4>
          </div>
          <div class="modal-body">
            <p>Cuentas con mas de un Rol en la plataforma, a continuación seleccione con cual de ellos desea trabajar
            </p>
            @foreach (session()->get("roles") as $key => $rol)
            <li>
              <a href="#" class="asignar-rol" data-rolid="{{$rol['gtvrole_id']}}"
                data-rolnombre="{{$rol['gtvrole_desc']}}">
                {{$rol['gtvrole_desc']}}
              </a>
            </li>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @endif
    <!-- Fin de ventana modal para login con mas de un rol -->
  </div>

  <!-- jQuery -->
  <script src="{{ asset("assets/$theme/plugins/jquery/jquery.min.js") }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset("assets/$theme/dist/js/adminlte.min.js") }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset("assets/$theme/dist/js/demo.js") }}"></script>
  <!-- Framework de validación JQuery -->
  @yield('scriptsPlugins')
  <script src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
  <script src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
  <script src="{{asset("assets/js/sweetalert2/sweetalert.min.js")}}"></script>
  <script src="{{asset("assets/js/toastr/toastr.min.js")}}"></script>
  <script src="{{asset("assets/js/scripts.js")}}"></script>
  <script src="{{asset("assets/js/functions.js")}}"></script>
  <!--La función functions.js procesa las validaciones y hace uso de jQuery Validation -->

  @yield("scripts")
</body>

</html>