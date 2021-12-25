<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'type' => 'admin',
            'role_id' => 1,
        ]);
        $admin->assignRole('admin');

        $A1 = Admin::create([
            'username' => 'A1',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'type' => 'A1',
            'role_id' => 2,
        ]);
        $A1->assignRole('A1');

        $A2 = Admin::create([
            'username' => '50',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'type' => 'A2',
            'role_id' => 3,
        ]);
        $A2->assignRole('A2');

        $A3 = Admin::create([
            'username' => '5050',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'type' => 'A3',
            'role_id' => 4,
        ]);
        $A3->assignRole('A3');

        $B1 = Admin::create([
            'username' => '505050',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'type' => 'B1',
            'role_id' => 5,
        ]);
        $B1->assignRole('B1');

        $B2 = Admin::create([
            'username' => '50505050',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'type' => 'B2',
            'role_id' => 6,
        ]);
        $B2->assignRole('B2');
    }
}
