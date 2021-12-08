<?php

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
        $this->call(UserSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(PaketSeeder::class);
        $this->call(PerusahaanSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(AlatSeeder::class);
    }
}
