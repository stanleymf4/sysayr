<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Gsbmenu extends Model
{
    protected $table = 'gsbmenu';
    protected $primaryKey = 'gsbmenu_id';
    protected $fillable = ['gsbmenu_name', 'gsbmenu_url', 'gsbmenu_icon'];
    protected $guarded = 'gsbmenu_id';
}
