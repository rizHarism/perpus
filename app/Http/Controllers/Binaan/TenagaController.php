<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Perpustakaan;
use App\Models\Binaan\Tenaga;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TenagaController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $tenaga = Tenaga::where('perpustakaan_id', $user_id)->get();
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->orderby('nama_sekolah')->get();
        // dd($tenaga);
        return view('binaan.datainput.tenagapustaka.index', [
            'tenaga' => $tenaga,
            'perpustakaan' => $perpustakaan
        ]);
    }

    public function filter($id, $tahun)
    {

        if ($id == 'undefined') {
            $id = Auth::user()->perpustakaan_id;
        }
        $tenaga = Tenaga::where('perpustakaan_id', $id)->where('tahun', $tahun)->get();
        return response()->json($tenaga, Response::HTTP_OK);
    }

    public function edit($id)
    {
        $tenaga = Tenaga::where('id', $id)->first();
        return response()->json($tenaga, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $tenaga = Tenaga::findOrFail($id);
        $tenaga->nama = $request->nama;
        $tenaga->status_pegawai = $request->pegawai;
        $tenaga->status_pendidikan = $request->pendidikan;
        $tenaga->jenis_kelamin = $request->kelamin;

        if ($tenaga->save()) {
            return response("Data Berhasil diubah!");
        } else {
            return response("Data Kecamatan Gagal diubah!", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function create()
    {
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->get();
        return response()->json($perpustakaan, Response::HTTP_OK);
    }
}
