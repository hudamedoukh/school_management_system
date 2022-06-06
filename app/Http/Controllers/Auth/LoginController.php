<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginForm($type){

        return view('auth.login',compact('type'));
    }

    public function login(Request $request){

        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
           return $this->redirect($request);
        }else{
            return Redirect::back();
        }

    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
