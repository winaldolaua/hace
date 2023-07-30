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
            [
                'name' => 'validasi', //bpjph nge cek => lanjut / dikembalikan -> klik tombol
                'color' => 'info'
            ],
            [
                'name' => 'verifikasi', // offline -> auditor hitung biaya -> ngirim file
                'color' => 'warning'
            ],
            [
                'name' => 'selesai verifikasi', // bpjph buat tagihan -> input angka
                'color' => 'primary'
            ],
            [
                'name' => 'belum bayar', // penyelia bayar tagihan -> ngirim file
                'color' => 'info'
            ],
            [
                'name' => 'validasi transaksi', // bpjph cek tagihan -> ngirim sttd
                'color' => 'warning'
            ],
            [
                'name' => 'lunas', // auditor verifikasi => lanjut / dibatalkan / dikembalikan -> klik tombol
                'color' => 'info'
            ],
            [
                'name' => 'sidang fatwa', // mui verifikasi -> klik tombol
                'color' => 'warning'
            ],
            [
                'name' => 'lulus sidang', // bpjph kirim sertifikat -> kirim file
                'color' => 'info'
            ],
            [
                'name' => 'selesai', // penyelia unduh -> klik tombol
                'color' => 'success'
            ],
            [
                'name' => 'dikembalikan',
                'color' => 'danger'
            ],
            [
                'name' => 'dibatalkan',
                'color' => 'secondary'
            ],
        ]);
        foreach ($status as $index => $st) {
            Status::create(['name' => $st['name'], 'color' => $st['color']]);
        }
    }
}
