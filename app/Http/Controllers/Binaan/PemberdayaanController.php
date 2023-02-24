<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Pemberdayaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemberdayaanController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $pemberdayaan = Pemberdayaan::where('perpustakaan_id', $user_id)->first();

        return view('binaan.datainput.pemberdayaan.index', [
            'pemberdayaan' => $pemberdayaan
        ]);
    }
}
