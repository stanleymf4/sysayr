@if ($item["submenu"] == [])
<li class="nav-item">
  <a href="{{url($item['gsbmenu_url'])}}" class="nav-link">
    <i class="nav-icon fas {{$item["gsbmenu_icon"]}}"></i>
    <p>
      {{$item["gsbmenu_name"]}}
    </p>
  </a>
</li>
@else
<li class="nav-item has-treeview menu-open">
  <a href="javascript:;" class="nav-link">
    <i class="nav-icon fas {{$item["gsbmenu_icon"]}}"></i>
    <p>
      {{$item["gsbmenu_name"]}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="background: rgba(68, 70, 80, 0.95)">
    @foreach ($item["submenu"] as $submenu)
    @include("theme.$theme.menu-item", ["item" => $submenu])
    @endforeach
  </ul>
</li>
@endif