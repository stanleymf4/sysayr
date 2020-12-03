<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\Security\Gsbuser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "/";
    protected $guard;

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

    protected function credentials(Request $request)
    {
        if ($this->guard == "web") {
            return [
                'uid' => $request->get($this->username()),
                'password' => $request->get('password'),
            ];
        } else if ($this->guard == "lc") {
            return $request->only($this->username(), 'password');
        }
    }


    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {

        $data = Gsbuser::where("gsbuser_login", $request->gsbuser_login)->first();
        if ($data->gsbuser_type_auth == "AD") {
            $this->guard = 'web';
        } else if ($data->gsbuser_type_auth == "LC") {
            $this->guard = 'lc';
        }

        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    protected function guard()
    {
        return Auth::guard($this->guard);
    }
}
