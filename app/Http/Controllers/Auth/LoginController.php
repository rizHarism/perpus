<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:inlislite')->except('logout');
        // $this->middleware('guest:binaan')->except('logout');
    }

    public function inlisliteLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('inlislite')->attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect()->intended('/inlislite/collection/catalogue');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    public function inlisliteLogout(Request $request)
    {
        if (Auth::guard('inlislite')->check()) // this means that the inlislite was logged in.
        {
            Auth::guard('inlislite')->logout();
            return redirect()->route('login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function binaanLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('binaan')->attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect()->intended('/binaan/profile');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    public function binaanLogout(Request $request)
    {
        if (Auth::guard('binaan')->check()) // this means that the binaan was logged in.
        {
            Auth::guard('binaan')->logout();
            return redirect()->route('login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function surveyLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('survey')->attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect()->intended('/survey/profile');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    public function pustakawanLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('pustakawan')->attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect()->intended('/pustakawan/profile');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    public function bidangLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('bidang')->attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect()->intended('/bidang/profile');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    public function username()
    {
        return 'username';
    }
}
