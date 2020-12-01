<?php

namespace App\Models\Security;

use App\Models\Admin\Gtvrole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class Gsbuser extends Authenticatable implements LdapAuthenticatable
{
    use Notifiable, AuthenticatesWithLdap;
    protected $remember_token = false;
    protected $table = 'gsbuser';
    protected $primaryKey = 'gsbuser_id';

    protected $fillable = [
        'gsbuser_login', 'gsbuser_name', 'password', 'gsbuser_email',
    ];

    public function roles()
    {
        return $this->belongsToMany(Gtvrole::class, 'gsbusrl', 'gsbusrl_user_id', 'gsbusrl_role_id');
    }

    public function setSession($roles)
    {
        dd('gsbuser');
        Session::put([
            'user_id' => $this->gsbuser_id,
            'userName' => $this->gsbuser_name,
            'user' => $this->gsbuser_login
        ]);

        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['gtvrole_id'],
                    'rol_name' => $roles[0]['gtvrole_desc'],
                ]
            );
        } else {
            Session::put('roles', $roles);
        }
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
}
