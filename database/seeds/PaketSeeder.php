<?php

use App\Paket;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paket::create([
            'nama' => 'Paket Platinum 1',
            'slug' => 'paket-platinum-1',
            'list_menu' => json_encode(["Nasi putih", "Daging lada hitam", "Telor balado", "Cap cai", "Sambal", "Buah", "Kerupuk", "Air mineral cup"]),
            'harga' => '30000',
            'keterangan' => 'untuk 1 porsi',
            'terlaris' => 1,
        ]);
    }
}
