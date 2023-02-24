<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Tenaga;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenagaController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $tenaga = Tenaga::where('perpustakaan_id', $user_id)->get();
        // dd($tenaga);
        return view('binaan.datainput.tenagapustaka.index', [
            'tenaga' => $tenaga
        ]);
    }
}
