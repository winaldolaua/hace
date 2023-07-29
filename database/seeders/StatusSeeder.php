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
            'Terkirim', 'Validasi', 'Verifikasi', 'Dikembalikan', 'Dibatalkan', 'Sidang Fatwa', 'Sertifikat Terbit', 'Selesai'
        ]);
        foreach ($status as $index => $st) {
            Status::create(['name' => $st]);
        }
    }
}
