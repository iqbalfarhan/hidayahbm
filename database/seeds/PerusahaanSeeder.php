<?php

use App\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perusahaan::create([
            'parameter' => 'nama',
            'value' => 'PT. Hidayah Borneo Mandiri',
        ]);

        Perusahaan::create([
            'parameter' => 'slogan',
            'value' => 'Perusahaan penyedia katring terbesar didunia',
        ]);

        Perusahaan::create([
            'parameter' => 'alamat',
            'value' => 'Jalan Syarifuddin Yoes Perum Balikpapan Regency Blok De Vallei D2 Nomor 19',
        ]);

        Perusahaan::create([
            'parameter' => 'telp',
            'value' => '081255724333',
        ]);

        Perusahaan::create([
            'parameter' => 'email',
            'value' => 'pt.hidayahborneomandiri01@gmail.com',
        ]);

        Perusahaan::create([
            'parameter' => 'logo',
            'value' => '/storage/logo.png',
        ]);
    }
}
