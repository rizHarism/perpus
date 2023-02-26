<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\KondisiUmum;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KondisiUmumController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $kondisi_umum = KondisiUmum::where('perpustakaan_id', $user_id)->first();
        // dd($kondisi_umum);

        return view('binaan.datainput.kondisiumum.index', [
            'kondisi_umum' => $kondisi_umum
        ]);
    }

    public function filter($id)
    {
        dd($id);
    }
}
