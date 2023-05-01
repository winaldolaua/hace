<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin','penyelia','auditor','verfikator'];
        foreach ($roles as $key => $role) {
            DB::table('role')->insert([
                'role_name' => $role
            ]);
        }
    }
}