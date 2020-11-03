<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Gtvrole extends Model
{
    protected $table = 'gtvrole';
    protected $primaryKey = 'gtvrole_id';
    protected $fillable = ['gtvrole_desc'];
    protected $guarded = ['gtvrole_id'];
}
