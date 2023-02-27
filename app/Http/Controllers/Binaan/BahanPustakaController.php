<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\BahanPustaka;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BahanPustakaController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $bahan_pustaka = BahanPustaka::where('perpustakaan_id', $user_id)->first();
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->orderby('nama_sekolah')->get();

        return view('binaan.datainput.bahanpustaka.index', [
            'bahan' => $bahan_pustaka,
            'perpustakaan' => $perpustakaan
        ]);
    }

    public function filter($id)
    {
        $bahan_pustaka = BahanPustaka::where('perpustakaan_id', $id)->first();

        return response()->json($bahan_pustaka, Response::HTTP_OK);
    }
}
