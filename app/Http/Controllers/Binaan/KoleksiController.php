<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Koleksi;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $koleksi = Koleksi::where('perpustakaan_id', $user_id)->first();
        return view('binaan.datainput.koleksi.index', [
            'koleksi' => $koleksi
        ]);
    }
}
