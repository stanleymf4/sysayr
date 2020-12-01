@extends("theme.$theme.layout")

@section('content')
@include('includes.message')

<!-- Main content -->
<div class="mx-auto" style="width: auto;">
  <div class="content">
    <div class="container">
      {{-- {{ phpinfo()}} --}}
      <div class="row justify-content-center align-items-center minh-100">
        <div class="col-lg-12">
          <div class="card">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-200" src="{{ asset("assets/$theme/dist/img/vista_empresa.png") }}"
                    alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-200" src="{{ asset("assets/$theme/dist/img/vista-empresa2.png") }}"
                    alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-200" src="{{ asset("assets/$theme/dist/img/vista-empresa3.png") }}"
                    alt="Third slide">
                </div>
              </div>
            </div>

          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection