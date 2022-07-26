<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Level;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Level::create([
        //     'name' => 'super admin',
        // ]);

        Admin::create([
            'name' => 'Trần Anh Tú',
            'email' => '04072001trananhtu@gmail.com',
            'phone' => '0857607645',
            'address' => 'Nam Định',
            'id_level' => 1,
            'password' => bcrypt('xxxxxxxx'),
        ]);
    }
}
