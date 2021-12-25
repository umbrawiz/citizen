<?php

namespace Database\Seeders;

use App\Models\Declaration;
use Illuminate\Database\Seeder;

class DeclarationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Declaration::factory()->count(1000)->create();
    }
}
