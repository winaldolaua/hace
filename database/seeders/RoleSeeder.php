<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = collect(['bpjph','penyelia','auditor','mui']);
        $roles->each(function($role,$key){
            Role::create([
                'name' => $role
            ]);
        });
    }
}
