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
        // $this->middleware('guest')->except('logout');
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
            return response()->json([
                'success' => true,
                'redirect' => route('collectionCatalogue')
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => "Login Gagal"
        ]);
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
            return response()->json([
                'success' => true,
                'redirect' => route('binaanProfile')
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Login Gagal'
        ]);
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
            return response()->json([
                'success' => true,
                'redirect' => '/survey/profile'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => "Login Gagal"
        ]);
    }

    public function pustakawanLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('pustakawan')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return response()->json([
                'success' => true,
                'redirect' => '/pustakawan/profile'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => "Login Gagal"
        ]);
    }

    public function bidangLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('bidang')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return response()->json([
                'success' => true,
                'redirect' => '/bidang/profile'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => "Login Gagal"
        ]);
    }

    public function username()
    {
        return 'username';
    }
}