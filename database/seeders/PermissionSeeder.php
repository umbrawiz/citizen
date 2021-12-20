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

        $admin = Role::create(['name' => 'administrator', 'guard_name' => 'admin']);
        $A1 = Role::create(['name' => 'A1', 'guard_name' => 'A1']);
        $A2 = Role::create(['name' => 'A2', 'guard_name' => 'A2']);
        $A3 = Role::create(['name' => 'A3', 'guard_name' => 'A3']);
        $B1 = Role::create(['name' => 'B1', 'guard_name' => 'B1']);
        $B2 = Role::create(['name' => 'B2', 'guard_name' => 'B2']);

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
                $listA1Permission[count($listA1Permission)]['name'] = $v;
                $listA1Permission[count($listA1Permission) - 1]['guard_name'] = 'A1';
            }
        }

        foreach ($A2Permission as $value) {
            foreach ($value as $v) {
                $listA2Permission[count($listA2Permission)]['name'] = $v;
                $listA2Permission[count($listA2Permission) - 1]['guard_name'] = 'A2';
            }
        }

        foreach ($A3Permission as $value) {
            foreach ($value as $v) {
                $listA3Permission[count($listA3Permission)]['name'] = $v;
                $listA3Permission[count($listA3Permission) - 1]['guard_name'] = 'A3';
            }
        }

        foreach ($B1Permission as $value) {
            foreach ($value as $v) {
                $listB1Permission[count($listB1Permission)]['name'] = $v;
                $listB1Permission[count($listB1Permission) - 1]['guard_name'] = 'B1';
            }
        }

        foreach ($B2Permission as $value) {
            foreach ($value as $v) {
                $listB2Permission[count($listB2Permission)]['name'] = $v;
                $listB2Permission[count($listB2Permission) - 1]['guard_name'] = 'B2';
            }
        }

        Permission::insert($listAllPermission);
        Permission::insert($listA1Permission);
        Permission::insert($listA2Permission);
        Permission::insert($listA3Permission);
        Permission::insert($listB1Permission);
        Permission::insert($listB2Permission);

        $roleAdmin = Permission::where('guard_name', 'admin')->pluck('name')->toArray();
        $roleA1 = Permission::where('guard_name', 'A1')->pluck('name')->toArray();
        $roleA2 = Permission::where('guard_name', 'A2')->pluck('name')->toArray();
        $roleA3 = Permission::where('guard_name', 'A3')->pluck('name')->toArray();
        $roleB1 = Permission::where('guard_name', 'B1')->pluck('name')->toArray();
        $roleB2 = Permission::where('guard_name', 'B2')->pluck('name')->toArray();

        $admin->syncPermissions($roleAdmin);
        $A1->syncPermissions($roleA1);
        $A2->syncPermissions($roleA2);
        $A3->syncPermissions($roleA3);
        $B1->syncPermissions($roleB1);
        $B2->syncPermissions($roleB2);
    }
}
