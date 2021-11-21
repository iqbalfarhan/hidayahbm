<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Akun Finance',
            'username' => 'finance',
            'password' => password_hash("adminoke", PASSWORD_DEFAULT),
            'akses' => 'finance'
        ]);

        User::create([
            'name' => 'Akun Admin Gudang',
            'username' => 'gudang',
            'password' => password_hash("adminoke", PASSWORD_DEFAULT),
            'akses' => 'gudang'
        ]);

        User::create([
            'name' => 'Akun Report',
            'username' => 'bos',
            'password' => password_hash("adminoke", PASSWORD_DEFAULT),
            'akses' => 'report'
        ]);

        User::create([
            'name' => 'Akun Just View',
            'username' => 'view',
            'password' => password_hash("adminoke", PASSWORD_DEFAULT),
            'akses' => 'view'
        ]);

        User::create([
            'name' => 'Administrator web',
            'username' => 'adminweb',
            'password' => password_hash("adminoke", PASSWORD_DEFAULT),
            'akses' => 'web'
        ]);
    }
}
