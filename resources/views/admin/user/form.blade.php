<div class="form-group row">
  <label for="nombre" class="col-lg-3 col-form-label requerido">Nombre</label>
  <div class="col-lg-8">
    <input type="text" name="gsbuser_name" class="form-control" id="nombre"
      value="{{old('gsbuser_name', $data->gsbuser_name ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="usuario" class="col-lg-3 col-form-label requerido">Usuario</label>
  <div class="col-lg-8">
    <input type="text" name="gsbuser_login" class="form-control" id="usuario"
      value="{{old('gsbuser_login', $data->gsbuser_login ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="email" class="col-lg-3 col-form-label requerido">E-Mail</label>
  <div class="col-lg-8">
    <input type="text" name="gsbuser_email" class="form-control" id="email"
      value="{{old('gsbuser_email', $data->gsbuser_email ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="password" class="col-lg-3 col-form-label requerido">Contraseña</label>
  <div class="col-lg-8">
    <input type="password" name="password" class="form-control" id="password"
      value="{{old('password', $data->password ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="re_password" class="col-lg-3 col-form-label requerido">Repita Contraseña</label>
  <div class="col-lg-8">
    <input type="password" name="re_password" class="form-control" id="re_password"
      value="{{old('re_password', $data->re_password ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="rol_id" class="col-lg-3 col-form-label requerido">Rol</label>
  <div class="col-lg-8">
    {{-- {{dd($roles[0])}} --}}
    <select name="rol_id" id="rol_id" class="form-control" required>
      <option value="">Seleccione el rol</option>
      @foreach ($roles as $id => $item)
      <option value="{{$id}}" {{old("rol_id", $data->roles[0]->gtvrole_id ?? "") == $id ? "selected" : ""}}>{{$item}}
      </option>
      @endforeach
    </select>
  </div>
</div>