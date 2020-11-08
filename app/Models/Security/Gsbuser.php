<?php

namespace App\Models\Security;

use App\Models\Admin\Gtvrole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class Gsbuser extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'gsbuser';
    protected $primaryKey = 'gsbuser_id';
    protected $guarded = ['gsbuser_id'];

    protected $fillable = [
        'gsbuser_login', 'gsbuser_name', 'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Gtvrole::class, 'gsbusrl', 'gsbusrl_user_id', 'gsbusrl_role_id');
    }

    public function setSession($roles)
    {
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['gtvrole_id'],
                    'rol_name' => $roles[0]['gtvrole_desc'],
                    'user_id' => $this->gsbuser_id,
                    'userName' => $this->gsbuser_name,
                    'user' => $this->gsbuser_login
                ]
            );
        }
    }
}
