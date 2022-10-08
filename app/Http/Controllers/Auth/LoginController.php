<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

     /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        $for = [
            'Penyuluh'  => 'penyuluh',
            'PKK'       => 'pkk',
            'Bidan'     => 'bidan',
            'Kader'     => 'kader',
        ];
        return $this->redirectTo = route($for[auth()->user()->role->name] . ".dashboard");
    }

    public function username()
    {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function credentials(Request $request)
    {
        if (is_numeric($request->get('username'))) {
            // dd('masuk if');
            return ['nik' => $request->get('username'), 'password' => $request->get('password')];
        } else {
            // dd('masuk else');
            return ['username' => $request->get('username'), 'password' => $request->get('password')];
        }
    }
}
