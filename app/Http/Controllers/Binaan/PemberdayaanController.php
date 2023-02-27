<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Pemberdayaan;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PemberdayaanController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $pemberdayaan = Pemberdayaan::where('perpustakaan_id', $user_id)->first();
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->orderby('nama_sekolah')->get();

        return view('binaan.datainput.pemberdayaan.index', [
            'pemberdayaan' => $pemberdayaan,
            'perpustakaan' => $perpustakaan,
        ]);
    }

    public function filter($id)
    {
        $pemberdayaan = Pemberdayaan::where('perpustakaan_id', $id)->first();

        return response()->json($pemberdayaan, Response::HTTP_OK);
    }
}
