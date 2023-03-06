<?php

namespace App\Http\Controllers\Koleksi;

use App\Http\Controllers\Controller;
use App\Models\User\InlisliteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InlisliteUserController extends Controller
{
    //
    public function index()
    {
        return view('inlislite.admin.user.index');
    }

    public function datatable()
    {
        $datatables = DataTables::of(InlisliteUser::with('permissions:id,name')
            ->orderBy('id', 'asc'))
            ->addIndexColumn()
            ->make(true);
        return $datatables;
    }

    public function edit($id)
    {
        $user = InlisliteUser::findOrFail($id);
        $permissions = Permission::get();
        $userPermissions = DB::table('model_has_permissions')->where('model_has_permissions.model_id', $id)
            ->pluck('model_has_permissions.permission_id', 'model_has_permissions.permission_id')
            ->all();

        $permissionsFormatted = [];

        if ($permissions) {
            foreach ($permissions as $permission) {
                $_permission = explode(".", $permission->name);
                if (count($_permission) == 2) {
                    $permissionsFormatted[$_permission[0]][] = [
                        'name' => $_permission[1],
                        'value' => $permission->id
                    ];
                }
            }
        }

        $response = [
            'user' => $user,
            'permissionsFormatted' => $permissionsFormatted,
            'userPermissions' => $userPermissions,
        ];
        return Response()->json($response, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $_permission = explode(",", $request->permission);
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $user = InlisliteUser::findOrFail($id);
            $user->name = $request->name;
            $user->username = $request->username;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            };
            $user->save();
            $user->syncPermissions($_permission);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response('Gagal Update Data User.', 500);
        }

        return response('User ' . $user->name . ' berhasil di update');
        dd($request);
    }

    public function create()
    {
        $permissions = Permission::get();

        $permissionsFormatted = [];

        if ($permissions) {
            foreach ($permissions as $permission) {
                $_permission = explode(".", $permission->name);
                if (count($_permission) == 2) {
                    $permissionsFormatted[$_permission[0]][] = [
                        'name' => $_permission[1],
                        'value' => $permission->id
                    ];
                }
            }
        }

        $response = [
            'permissionsFormatted' => $permissionsFormatted
        ];
        return Response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        // dd($request);
        $_permission = explode(",", $request->permission);
        $this->validate($request, [
            'name' => 'required|unique:inlislite_user,name',
            'username' => 'required|unique:inlislite_user,username',
            'permission' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $user = InlisliteUser::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'avatar' => $request->avatar,
            ]);
            $user->syncPermissions($_permission);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response($e->getMessage(), 501);
        }

        return response('Data user ' . $user->name . ' berhasil dibuat');
    }
}
