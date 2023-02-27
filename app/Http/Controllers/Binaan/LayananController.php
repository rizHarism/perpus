<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Layanan;
use App\Models\Binaan\Perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LayananController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $layanan = Layanan::where('perpustakaan_id', $user_id)->first();
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->orderby('nama_sekolah')->get();

        return view('binaan.datainput.layanan.index', [
            'layanan' => $layanan,
            'perpustakaan' => $perpustakaan,
        ]);
    }

    public function filter($id)
    {
        $layanan = Layanan::where('perpustakaan_id', $id)->first();

        return response()->json($layanan, Response::HTTP_OK);
    }
}
