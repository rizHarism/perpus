<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthController extends Controller
{
    //check auth for guard

    public function inlisliteAuth()
    {
        return response()->json([
            'auth' => Auth::guard('inlislite')->check(),
            'route' => 'inlislite/collection/catalogue'
        ]);
    }

    public function binaanAuth()
    {
        return response()->json([
            'auth' => Auth::guard('binaan')->check(),
            'route' => 'binaan/binaan/'
        ]);
    }
}
