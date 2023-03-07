<?php

namespace App\Http\Controllers\Binaan;

use App\Http\Controllers\Controller;
use App\Models\User\BinaanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function show()
    {
        $user_id = Auth::user()->id;
        $data_user = BinaanUser::with('perpustakaan')->findOrFail($user_id);

        return view('binaan.profile.index', [
            'user' => $data_user
        ]);
    }
}
