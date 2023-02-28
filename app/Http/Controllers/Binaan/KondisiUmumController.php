<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\KondisiUmum;
use App\Models\Binaan\Perpustakaan;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

    public function edit($id, $tahun)
    {
        $kondisi = KondisiUmum::where('perpustakaan_id', $id)->where('tahun', $tahun)->first();
        return response()->json($kondisi, Response::HTTP_OK);
    }

    public function create()
    {
        $perpustakaan = Perpustakaan::select('id', 'nama_sekolah')->get();
        return response()->json($perpustakaan, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => Rule::unique('binaan_kondisi_umum')->where(function ($query) use ($request) {
                return $query->where('perpustakaan_id', $request->perpus_id);
            })
        ]);

        $kondisi = KondisiUmum::create([
            'tahun' => $request->tahun,
            'perpustakaan_id' => $request->perpus_id,
            'npp' => $request->npp,
            'sk_pendirian' => $request->sk,
            'program_kerja' => $request->program,
            'visi_misi' => $request->visi,
            'siswa_l' => $request->sL,
            'siswa_p' => $request->sP,
            'staff_l' => $request->gL,
            'staff_p' => $request->gP,
            'rombongan_belajar' => $request->rombel,
            'status' => 1,
        ]);

        if ($kondisi) {
            return response("Data Kondisi Umum Berhasil ditambahkan!");
        } else {
            return response("Data gagal ditambahkan!");
        };
    }

    public function update(Request $request, $id)
    {
        $kondisi = KondisiUmum::findOrFail($id);
        // dd($request);
        $kondisi->npp = $request->npp;
        $kondisi->sk_pendirian = $request->sk;
        $kondisi->program_kerja = $request->program;
        $kondisi->visi_misi = $request->visi;
        $kondisi->siswa_l = $request->sL;
        $kondisi->siswa_p = $request->sP;
        $kondisi->staff_l = $request->gL;
        $kondisi->staff_p = $request->gP;
        $kondisi->rombongan_belajar = $request->rombel;

        if ($kondisi->save()) {
            return response("Data Berhasil diubah!");
        } else {
            return response("Data Kecamatan Gagal diubah!", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
