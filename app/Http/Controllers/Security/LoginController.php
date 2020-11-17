<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "/";

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('security.index');
    }

    public function username()
    {
        return 'gsbuser_login';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->get();
        if ($roles->isNotEmpty()) {
            $user->setSession($roles->toArray());
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('security/login')->withErrors(['error' => 'Este usuario no tiene un rol activo']);
        }
    }
}
