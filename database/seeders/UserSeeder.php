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
                'name' => 'BPJPH',
                'email' => 'bpjph@gmail.com',
                'role' => 1
            ]),
            'penyelia' => collect([
                'name' => 'Penyelia 1',
                'email' => 'penyelia@gmail.com',
                'role' => 2
            ]),
            'auditor' => collect([
                'name' => 'Auditor 1',
                'email' => 'auditor@gmail.com',
                'role' => 3
            ]),
            'verifikator' => collect([
                'name' => 'MUI',
                'email' => 'mui@gmail.com',
                'role' => 4
            ])
        ]);
        foreach ($users as $key => $user) {
            //if($key === 'admin') $role_id = 1;
            //else if($key === 'penyelia') $role_id = 2;
            //else if($key === 'auditor') $role_id = 3;
            //else $role_id = 4;
            User::create([
                'role_id' => $user['role'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('xxxxx')
            ]);
        }
    }
}
