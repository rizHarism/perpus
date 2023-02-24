<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\BahanPustaka;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BahanPustakaController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $bahan_pustaka = BahanPustaka::where('perpustakaan_id', $user_id)->first();

        return view('binaan.datainput.bahanpustaka.index', [
            'bahan' => $bahan_pustaka
        ]);
    }
}
