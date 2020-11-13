<div class="form-group row">
  <label for="gtvpmss_desc" class="col-lg-3 col-form-label requerido">Nombre</label>
  <div class="col-lg-8">
    <input type="text" name="gtvpmss_desc" class="form-control" id="gtvpmss_desc"
      value="{{old('gtvpmss_desc', $data->gtvpmss_desc ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="gtvpmss_slug" class="col-lg-3 col-form-label requerido">Slug</label>
  <div class="col-lg-8">
    <input type="text" name="gtvpmss_slug" class="form-control" id="gtvpmss_slug"
      value="{{old('gtvpmss_slug', $data->gtvpmss_slug ?? '')}}" required />
  </div>
</div>