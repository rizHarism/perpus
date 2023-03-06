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
            'route' => 'binaan/profile'
        ]);
    }

    public function surveyAuth()
    {
        return response()->json([
            'auth' => Auth::guard('survey')->check(),
            'route' => 'survey/profile'
        ]);
    }

    public function pustakawanAuth()
    {
        return response()->json([
            'auth' => Auth::guard('pustakawan')->check(),
            'route' => 'pustakawan/profile'
        ]);
    }

    public function bidangAuth()
    {
        return response()->json([
            'auth' => Auth::guard('bidang')->check(),
            'route' => 'bidang/profile'
        ]);
    }
}
