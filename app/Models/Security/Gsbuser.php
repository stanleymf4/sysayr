<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Gsbuser extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'gsbuser';
    protected $primaryKey = 'gsbuser_id';
    protected $guarded = ['gsbuser_id'];

    protected $fillable = [
        'gsbuser_login', 'gsbuser_name', 'password',
    ];
}
