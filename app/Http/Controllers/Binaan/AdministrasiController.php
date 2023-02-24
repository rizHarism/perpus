<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Administrasi;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministrasiController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $administrasi = Administrasi::where('perpustakaan_id', $user_id)->first();

        return view('binaan.datainput.administrasi.index', [
            'administrasi' => $administrasi
        ]);
    }
}
