<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\Binaan\Sarana;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaranaController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->perpustakaan_id;
        $sarana = Sarana::where('perpustakaan_id', $user_id)->first();

        return view('binaan.datainput.sarana.index', [
            'sarana' => $sarana
        ]);
    }
}
