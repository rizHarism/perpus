<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Administrasi;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class AdministrasiController extends Controller
{
    //
    public function show()
    {
        // $user_id = Auth::user()->perpustakaan_id;
        // $administrasi = Administrasi::where('perpustakaan_id', $user_id)->first();
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->orderby('nama_sekolah')->get();

        return view('binaan.datainput.administrasi.index', [
            // 'administrasi' => $administrasi,
            'perpustakaan' => $perpustakaan,
        ]);
    }

    public function filter($id, $tahun)
    {

        if ($id == 'undefined') {
            $id = Auth::user()->perpustakaan_id;
        }
        $administrasi = Administrasi::where('perpustakaan_id', $id)->where('tahun', $tahun)->first();
        return response()->json($administrasi, Response::HTTP_OK);
    }

    public function edit($id, $tahun)
    {
        $administrasi = Administrasi::where('perpustakaan_id', $id)->where('tahun', $tahun)->first();
        return response()->json($administrasi, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $administrasi = Administrasi::findOrFail($id);
        $administrasi->buku_induk = $request->induk;
        $administrasi->buku_pengunjung = $request->pengunjung;
        $administrasi->katalog_kartu = $request->katalog;

        if ($administrasi->save()) {
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
            'tahun' => Rule::unique('binaan_administrasi')->where(function ($query) use ($request) {
                return $query->where('perpustakaan_id', $request->perpus_id);
            })
        ]);

        $administrasi = Administrasi::create([
            'tahun' => $request->tahun,
            'perpustakaan_id' => $request->perpus_id,
            'buku_induk' => $request->induk,
            'buku_pengunjung' => $request->pengunjung,
            'katalog_kartu' => $request->katalog,
            'status' => 1,
        ]);

        if ($administrasi) {
            return response("Data Kondisi Umum Berhasil ditambahkan!");
        } else {
            return response("Data gagal ditambahkan!");
        };
    }
}
