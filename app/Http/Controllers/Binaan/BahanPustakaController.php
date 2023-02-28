<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\BahanPustaka;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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

    public function filter($id, $tahun)
    {

        if ($id == 'undefined') {
            $id = Auth::user()->perpustakaan_id;
        }
        $bahan_pustaka = BahanPustaka::where('perpustakaan_id', $id)->where('tahun', $tahun)->first();
        return response()->json($bahan_pustaka, Response::HTTP_OK);
    }

    public function edit($id, $tahun)
    {
        $bahan = BahanPustaka::where('perpustakaan_id', $id)->where('tahun', $tahun)->first();
        return response()->json($bahan, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $bahan = BahanPustaka::findOrFail($id);
        $bahan->pedoman_katalog = $request->katalog;
        $bahan->pedoman_klasifikasi = $request->klasifikasi;
        $bahan->aplikasi_perpus = $request->aplikasi;

        if ($bahan->save()) {
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => Rule::unique('binaan_bahan_pustaka')->where(function ($query) use ($request) {
                return $query->where('perpustakaan_id', $request->perpus_id);
            })
        ]);
        // dd($request);

        $bahan = BahanPustaka::create([
            'tahun' => $request->tahun,
            'perpustakaan_id' => $request->perpus_id,
            'pedoman_katalog' => $request->katalog,
            'pedoman_klasifikasi' => $request->klasifikasi,
            'aplikasi_perpus' => $request->aplikasi,
            'status' => 1,
        ]);

        if ($bahan) {
            return response("Data Kondisi Umum Berhasil ditambahkan!");
        } else {
            return response("Data gagal ditambahkan!");
        };
    }
}
