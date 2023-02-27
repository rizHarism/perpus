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

    public function filter($id)
    {
        $tenaga = Tenaga::where('perpustakaan_id', $id)->get();

        return response()->json($tenaga, Response::HTTP_OK);
    }
}
