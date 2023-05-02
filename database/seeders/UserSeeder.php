<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = collect([
            'admin' => collect([
                'name' => 'Admin',
                'email' => 'admin@gmail.com'
            ]),
            'penyelia' => collect([
                'name' => 'Penyelia 1',
                'email' => 'penyelia@gmail.com'
            ]),
            'auditor' => collect([
                'name' => 'Auditor 1',
                'email' => 'auditor@gmail.com'
            ]),
            'verifikator' => collect([
                'name' => 'Verifikator 1',
                'email' => 'verifikator@gmail.com'
            ])
        ]);
        foreach ($users as $key => $user) {
            if($key === 'admin') $role_id => 1,
            else if($key === 'penyelia') $role_id = 2,
            else if($key === 'auditor') $role_id = 3,
            else $role_id = 4
            User::create([
                'role_id' => $role_id,
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('xxxxx')
            ]);
        }
    }
}
