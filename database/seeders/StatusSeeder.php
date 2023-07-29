<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = collect([
            'terkirim', 'validasi', 'verifikasi', 'dikembalikan', 'dibatalkan', 'sidang fatwa', 'sertifikat terbit', 'selesai'
        ]);
        foreach ($status as $index => $st) {
            Status::create(['name' => $st]);
        }
    }
}
