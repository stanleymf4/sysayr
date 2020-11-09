<?php

if (!function_exists('getMenuActivo')) {
  function getMenuActivo($route)
  {
    if (request()->is($route) || request()->is($route . '/*')) {
      return ' active ';
    } else {
      return '';
    }
  }
}
