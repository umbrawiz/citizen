<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $A1 = Role::create(['name' => 'A1', 'guard_name' => 'admin']);
        $A2 = Role::create(['name' => 'A2', 'guard_name' => 'admin']);
        $A3 = Role::create(['name' => 'A3', 'guard_name' => 'admin']);
        $B1 = Role::create(['name' => 'B1', 'guard_name' => 'admin']);
        $B2 = Role::create(['name' => 'B2', 'guard_name' => 'admin']);

        $allPermission = config('permission.list');
        $A1Permission = config('permission.A1');
        $A2Permission = config('permission.A2');
        $A3Permission = config('permission.A3');
        $B1Permission = config('permission.B1');
        $B2Permission = config('permission.B2');

        $listAllPermission = [];
        $listA1Permission = [];
        $listA2Permission = [];
        $listA3Permission = [];
        $listB1Permission = [];
        $listB2Permission = [];

        foreach ($allPermission as $value) {
            foreach ($value as $v) {
                $listAllPermission[count($listAllPermission)]['name'] = $v;
                $listAllPermission[count($listAllPermission) - 1]['guard_name'] = 'admin';
            }
        }

        foreach ($A1Permission as $value) {
            foreach ($value as $v) {
                $listA1Permission[] = $v;
            }
        }

        foreach ($A2Permission as $value) {
            foreach ($value as $v) {
                $listA2Permission[] = $v;
            }
        }

        foreach ($A3Permission as $value) {
            foreach ($value as $v) {
                $listA3Permission[] = $v;
            }
        }

        foreach ($B1Permission as $value) {
            foreach ($value as $v) {
                $listB1Permission[] = $v;
            }
        }

        foreach ($B2Permission as $value) {
            foreach ($value as $v) {
                $listB2Permission[] = $v;
            }
        }

        Permission::insert($listAllPermission);

        $roleAdmin = Permission::pluck('name')->toArray();

        $admin->syncPermissions($roleAdmin);
        $A1->syncPermissions($listA1Permission);
        $A2->syncPermissions($listA2Permission);
        $A3->syncPermissions($listA3Permission);
        $B1->syncPermissions($listB1Permission);
        $B2->syncPermissions($listB2Permission);
    }
}
