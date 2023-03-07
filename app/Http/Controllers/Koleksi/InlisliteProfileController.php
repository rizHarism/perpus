<?php

namespace App\Http\Controllers\Koleksi;

use App\Http\Controllers\Controller;
use App\Models\User\InlisliteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InlisliteProfileController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        return view('inlislite.profile.index', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = InlisliteUser::findOrFail($request->id);

        $validations = [];
        if ($user->name != $request->namalengkap) {
            $validations['namalengkap'] = 'required';
        }
        if ($user->username != $request->username) {
            $validations['username'] = 'required|unique,inlislite_user,username';
        }

        if ($request->hasfile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/image/avatar'), $image);
        } else {
            $image = $user->avatar;
        }

        $this->validate($request, $validations);

        try {
            DB::beginTransaction();
            $user->name = $request->namalengkap;
            $user->username = $request->username;
            $user->avatar = $image;
            $user->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response('Gagal update profil', 500);
        }

        return response('Profil berhasil diupdate');
    }

    public function updatePassword(Request $request)
    {
        $user = InlisliteUser::findOrFail($request->id);
        // dd($request);
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'new_password_conf' => 'required|same:new_password',
        ]);

        // dd(Hash::check($request->old_password, $user->password));

        try {
            DB::beginTransaction();

            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
            } else {
                return response([
                    'status' => false,
                    'message' => 'Password lama tidak sesuai'
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response('Gagal update password', 500);
        }

        return response([
            'status' => true,
            'message' => 'Password berhasil diubah'
        ]);
    }
}
