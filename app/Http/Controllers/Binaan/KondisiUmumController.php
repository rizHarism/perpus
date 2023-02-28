<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\KondisiUmum;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Undefined;
use Symfony\Component\HttpFoundation\Response;

class KondisiUmumController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $kondisi_umum = KondisiUmum::where('perpustakaan_id', $user_id)->first();
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->orderby('nama_sekolah')->get();

        return view('binaan.datainput.kondisiumum.index', [
            'kondisi_umum' => $kondisi_umum,
            'perpustakaan' => $perpustakaan
        ]);
    }

    public function filter($id, $tahun)
    {
        if ($id == 'undefined') {
            $id = Auth::user()->perpustakaan_id;
        }
        $kondisi_umum = KondisiUmum::where('perpustakaan_id', $id)->where('tahun', $tahun)->first();
        return response()->json($kondisi_umum, Response::HTTP_OK);
    }

    public function edit($id)
    {
        $kondisi = KondisiUmum::where('perpustakaan_id', $id)->first();
        return response()->json($kondisi, Response::HTTP_OK);
    }

    public function update(Request $request)
    {
    }
}
