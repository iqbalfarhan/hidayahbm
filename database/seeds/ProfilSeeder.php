<?php

use App\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profil::create([
            'judul' => 'Kata Pengantar',
            'slug' => 'kata-pengantar',
            'isi' => "<i><b>Dengan hormat,</b></i>\n\nKami segenap direksi beserta staf PT. Hidayah Borneo Mandiri menghaturkan salam hormat kepada Bapak atau Ibu pimpinan semoga dalam menjalankan perusahaan selalu diberi kesehatan lahir dan batin serta memperoleh kemajuan keberhasilan dan manfaat untuk perusahaan bapak ibu pimpinan.\n\nBersama ini pula kami sampaikan company profile kepada bapak atau ibu untuk menjadi kajian dan pertimbangan agar kami bisa menjadi rekanan perusahaan dalam bidang pengadaan produk dan jasa catering.\n\nPerkenalan secara tertulis di ini tentu belum memadai oleh karena itu kami sebagai staff siap dan bersedia memberikan tambahan keterangan dan informasi secara lisan dengan memberikan pelayanan yang terbaik.",
        ]);
    }
}
