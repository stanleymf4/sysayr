<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dirección de Admisiones y Registro | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


  {{-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}

  <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/adminlte.min.css") }}">
  <!-- Google Font: Source Sans Pro -->
  <link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="{{asset("assets/css/custom.css")}}" rel="stylesheet">
</head>

<body class="hold-transition login-page">


  <nav id="header_login" class="navbar navbar-yellow navbar-light navbar-expand-lg ">
    <a class="navbar-brand" href="#">
      <img src="{{asset("assets/image/uniandes.svg")}}" alt="">
    </a>
    <p class="text-left" id="tex_oficce"> | Dirección de Admisiones y Registro </p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Calendario Académico <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Oferta Académica</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="login-box">
    <div class="login-logo">
      <a href="{{route('start')}}">Admisiones y Registro</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Inicie su session</p>
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <div class="alert-text">
            @foreach ($errors->all() as $error)
            <span>{{$error}}</span>
            @endforeach
          </div>
        </div>
        @endif
        <form action="{{route('login')}}" method="post" autocomplete="off">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="gsbuser_login" class="form-control" value="{{old('gsbuser_login')}}"
              placeholder="Usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8"></div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <footer id="footer_login" class="pb-1 pt-1">
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-12">
          Universidad de los Andes © 2020 | Vigilada Mineducación.
        </div>
        <div class="col-12">
          Reconocimiento como Universidad: Decreto 1297 del 30 de mayo de 1964.
        </div>
        <div class="col-12">
          Reconocimiento personería jurídica: Resolución 28 del 23 de febrero de 1949 Minjusticia.
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset("assets/$theme/plugins/jquery/jquery.min.js") }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <!-- AdminLTE App -->
  {{-- <script src="../../dist/js/adminlte.min.js"></script> --}}

</body>

</html>