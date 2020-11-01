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
  <!-- Google Font: Source Sans Pro -->
  <link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="{{asset("assets/css/custom.css")}}" rel="stylesheet">
  @yield("styles")
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
  <script src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
  <script src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
  <script src="{{asset("assets/js/functions.js")}}"></script>
  <!--La función functions.js procesa las validaciones y hace uso de jQuery Validation -->

  @yield("scripts")
</body>

</html>