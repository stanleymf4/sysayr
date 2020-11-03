<div class="form-group row">
  <label for="description" class="col-lg-3 col-form-label requerido">Nombre</label>
  <div class="col-lg-8">
    <input type="text" name="gtvrole_desc" class="form-control" id="name"
      value="{{old('gtvrole_desc', $data->gtvrole_desc ?? '')}}" required />
  </div>
</div>