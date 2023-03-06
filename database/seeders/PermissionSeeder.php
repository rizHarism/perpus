<?php

namespace Database\Seeders;

use App\Models\User\BinaanUser;
use App\Models\User\InlisliteUser;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create permission Inlislite
        Permission::firstOrCreate(['guard_name' => 'inlislite', 'name' => 'menu.koleksi']);
        Permission::firstOrCreate(['guard_name' => 'inlislite', 'name' => 'menu.sirkulasi']);
        Permission::firstOrCreate(['guard_name' => 'inlislite', 'name' => 'menu.pemustaka']);
        Permission::firstOrCreate(['guard_name' => 'inlislite', 'name' => 'menu.administrator']);

        // assigning user  default permission
        InlisliteUser::truncate();
        $adminPermission = [
            'menu.koleksi',
            'menu.sirkulasi',
            'menu.pemustaka',
            'menu.administrator',
        ];

        $generalPermission = [
            'menu.koleksi',
            'menu.sirkulasi',
            'menu.pemustaka',
        ];

        $admin = InlisliteUser::where('username', 'admin')->first();
        $general = InlisliteUser::where('username', 'user')->first();
        if (!$admin) {
            $admin = InlisliteUser::firstOrCreate([
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('pass123'),
                'avatar' => 'default-avatar.png',
            ]);
        }

        if (!$general) {
            $general = InlisliteUser::firstOrCreate([
                'name' => 'User',
                'username' => 'user',
                'password' => bcrypt('pass123'),
                'avatar' => 'default-avatar.png',
            ]);
        }

        $admin->syncPermissions($adminPermission);
        $general->syncPermissions($generalPermission);
    }
}
