<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Pemberdayaan;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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

    public function filter($id, $tahun)
    {

        if ($id == 'undefined') {
            $id = Auth::user()->perpustakaan_id;
        }
        $pemberdayaan = Pemberdayaan::where('perpustakaan_id', $id)->where('tahun', $tahun)->first();
        return response()->json($pemberdayaan, Response::HTTP_OK);
    }

    public function edit($id, $tahun)
    {
        $pemberdayaan = Pemberdayaan::where('perpustakaan_id', $id)->where('tahun', $tahun)->first();
        return response()->json($pemberdayaan, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $pemberdayaan = Pemberdayaan::findOrFail($id);
        $pemberdayaan->program_leaflet = $request->leaflet;
        $pemberdayaan->program_banner = $request->banner;
        $pemberdayaan->program_brosur = $request->brosur;
        $pemberdayaan->program_penyuluhan = $request->penyuluhan;
        $pemberdayaan->program_pameran = $request->pameran;
        $pemberdayaan->program_lomba = $request->lomba;
        $pemberdayaan->pengunjung_harian = $request->pengunjung;
        $pemberdayaan->sumber_bos = $request->bos;
        $pemberdayaan->sumber_apbd = $request->apbd;
        $pemberdayaan->sumber_lainnya = $request->sumber;
        $pemberdayaan->alokasi_pelajaran = $request->pelajaran;
        $pemberdayaan->alokasi_pengayaan = $request->pengayaan;
        $pemberdayaan->alokasi_lainnya = $request->alokasi;
        $pemberdayaan->penambahan_buku = $request->penambahan;

        if ($pemberdayaan->save()) {
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
            'tahun' => Rule::unique('binaan_pemberdayaan')->where(function ($query) use ($request) {
                return $query->where('perpustakaan_id', $request->perpus_id);
            })
        ]);

        $pemberdayaan = Pemberdayaan::create([
            'tahun' => $request->tahun,
            'perpustakaan_id' => $request->perpus_id,
            'slogan' => $request->slogan,
            'program_leaflet' => $request->leaflet,
            'program_banner' => $request->banner,
            'program_brosur' => $request->brosur,
            'program_penyuluhan' => $request->penyuluhan,
            'program_pameran' => $request->pameran,
            'program_lomba' => $request->lomba,
            'pengunjung_harian' => $request->pengunjung,
            'sumber_bos' => $request->bos,
            'sumber_apbd' => $request->apbd,
            'sumber_lainnya' => $request->sumber,
            'alokasi_pelajaran' => $request->pelajaran,
            'alokasi_pengayaan' => $request->pengayaan,
            'alokasi_lainnya' => $request->alokasi,
            'penambahan_buku' => $request->penambahan,
            'status' => 1,
        ]);

        if ($pemberdayaan) {
            return response("Data Kondisi Umum Berhasil ditambahkan!");
        } else {
            return response("Data gagal ditambahkan!");
        };
    }
}
