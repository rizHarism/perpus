<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $layanan = Layanan::where('perpustakaan_id', $user_id)->first();

        return view('binaan.datainput.layanan.index', [
            'layanan' => $layanan
        ]);
    }
}
