@if (session("message"))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-check"></i> Mensaje Sistema AYR</h5>
  <ul>
    <li>{{ session("message") }}</li>
  </ul>
</div>
@endif