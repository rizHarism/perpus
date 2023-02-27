<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Koleksi;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KoleksiController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $koleksi = Koleksi::where('perpustakaan_id', $user_id)->first();
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->orderby('nama_sekolah')->get();
        return view('binaan.datainput.koleksi.index', [
            'koleksi' => $koleksi,
            'perpustakaan' => $perpustakaan,
        ]);
    }

    public function filter($id)
    {
        $koleksi = Koleksi::where('perpustakaan_id', $id)->first();

        return response()->json($koleksi, Response::HTTP_OK);
    }
}
