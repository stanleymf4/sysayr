<div class="form-group row">
  <label for="name" class="col-lg-3 col-form-label requerido">Nombre</label>
  <div class="col-lg-8">
    <input type="text" name="gsbmenu_name" class="form-control" id="name"
      value="{{old('gsbmenu_name', $data->gsbmenu_name ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="url" class="col-lg-3 col-form-label requerido">Url</label>
  <div class="col-lg-8">
    <input type="text" name="gsbmenu_url" class="form-control" id="url"
      value="{{old('gsbmenu_url', $data->gsbmenu_url ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="icon" class="col-lg-3 col-form-label">Icono</label>
  <div class="col-lg-8">
    <input type="text" name="gsbmenu_icon" class="form-control" id="icon"
      value="{{old('gsbmenu_icon', $data->gsbmenu_icon ?? '')}}" />
  </div>
  <div class="col-lg-1">
    <span id="show-icon" class="fa fa-fw {{old("gsbmenu_icon")}}"></span>
  </div>
</div>