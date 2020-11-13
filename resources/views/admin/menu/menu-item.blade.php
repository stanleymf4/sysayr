@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{ $item["gsbmenu_id"] }}">
  <div class="dd-handle dd3-handle"></div>
  <div class="dd3-content {{$item["gsbmenu_url"] == "javascript:;" ? "font-weight-bold" : ""}}">
    <a href="{{route("editMenu", ['id' => $item["gsbmenu_id"]])}}">
      {{$item["gsbmenu_name"]." | url -> ".$item["gsbmenu_url"]}} Icono -> <i style="font-size:20px;"
        class="fa fa-fw {{isset($item["gsbmenu_icon"]) ? $item["gsbmenu_icon"] : ""}}"></i></a>
    <a href="{{route("deleteMenu", ['id' => $item["gsbmenu_id"]])}}" class="eliminar-menu float-right tooltipsC"
      title="Eliminar de este menú"><i class="fa fa-fw fa-trash text-danger"></i></a>
  </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{ $item["gsbmenu_id"] }}">
  <div class="dd-handle dd3-handle"></div>
  <div class="dd3-content {{$item["gsbmenu_url"] == "javascript:;" ? "font-weight-bold" : ""}}">
    <a href="{{route("editMenu", ['id' => $item["gsbmenu_id"]])}}">
      {{$item["gsbmenu_name"]." | url -> ".$item["gsbmenu_url"]}} Icono -> <i style="font-size:20px;"
        class="fa fa-fw {{isset($item["gsbmenu_icon"]) ? $item["gsbmenu_icon"] : ""}}"></i></a>
    <a href="{{route('deleteMenu', ['id' => $item["gsbmenu_id"]])}}" class="eliminar-menu float-right tooltipsC"
      title="Eliminar de este menú"><i class="fa fa-fw fa-trash text-danger"></i></a>
  </div>
  <ol class="dd-list">
    @foreach ($item["submenu"] as $submenu)
    @include('admin.menu.menu-item', ["item" => $submenu])
    @endforeach
  </ol>
</li>
@endif