<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{



    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' =>date('Y-m-d H:i:s', time()),
        ]);
        DB::table('roles')->insert([
            'name' => 'Organizer',
            'created_at' =>date('Y-m-d H:i:s', time()),
        ]);
        DB::table('roles')->insert([
            'name' => 'User',
            'created_at' =>date('Y-m-d H:i:s', time()),
        ]);
    }
}
