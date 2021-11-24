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
            'judul' => 'Tentang Perusahaan',
            'slug' => 'tentang-perusahaan',
            'tampil_di_home' => 1,
            'isi' => "PT. Hidayah Borneo Mandiri merupakan perusahaan \"Jasa Boga\" mempunyai tanggung jawab yang besar untuk menyediakan cathering dan Camp service lainnya kepada pelanggan dengan kualitas yang tinggi dan higienis dan semuanya memenuhi standar dan aman lingkungan. seluruh pegawai PT. Hidayah Borneo Mandiri diwajibkan mematuhi peraturan yang telah diberlakukan, menjaga kebersihan lingkungan, kebersihan diri dan lingkungan kerja dalam pelaksanaan tugas di lokasi kerja.",
        ]);

        Profil::create([
            'judul' => 'Kata Pengantar',
            'slug' => 'kata-pengantar',
            'isi' => "<i><b>Dengan hormat,</b></i>\n\nKami segenap direksi beserta staf PT. Hidayah Borneo Mandiri menghaturkan salam hormat kepada Bapak atau Ibu pimpinan semoga dalam menjalankan perusahaan selalu diberi kesehatan lahir dan batin serta memperoleh kemajuan keberhasilan dan manfaat untuk perusahaan bapak ibu pimpinan.\n\nBersama ini pula kami sampaikan company profile kepada bapak atau ibu untuk menjadi kajian dan pertimbangan agar kami bisa menjadi rekanan perusahaan dalam bidang pengadaan produk dan jasa catering.\n\nPerkenalan secara tertulis di ini tentu belum memadai oleh karena itu kami sebagai staff siap dan bersedia memberikan tambahan keterangan dan informasi secara lisan dengan memberikan pelayanan yang terbaik.",
        ]);

        Profil::create([
            'judul' => 'Sejarah Berdiri',
            'slug' => 'sejarah-berdiri',
            'isi' => "PT. Hidayah Borneo Mandiri telah berdiri tahun 2016 dimana perusahaan ini didirikan sebagai pengembangan dari usaha pribadi.\n\nAlasan kemunculan di PT. Hidayah Borneo Mandiri dikarenakan jangka panjang untuk eksis dalam pengadaan barang dan jasa untuk menjalin kerjasama dengan perusahaan terutama yang bergerak di bidang migas dan pertambangan.\n\nKami juga sadar untuk selalu mengutamakan kesehatan pangan yang selalu menjaga kualitas makanan yang kami sediakan.",
        ]);

        Profil::create([
            'judul' => 'Visi & misi Perusahaan',
            'slug' => 'visi-misi-perusahaan',
            'isi' => "Misi perusahaan\nvisi perusahaan menjadi bisnis katering terpercaya dalam menjalankan permintaan keinginan dan harapan pelanggan menghasilkan kepuasan rasa dan layanan yang men dengarkan dan menunjang tinggi bahwa konsumen adalah raja\n\nMisi Perusahaan\nmisi perusahaan meningkatkan profesionalisme produktivitas dan efisiensi kami untuk mencapai kepuasan pelanggan, antara lain melalui ketetapan waktu, pelayanan prima, dan penyediaan makanan yang berkualitas, sehat dan bercitarasa. membangun hubungan jangka panjang dengan pelanggan sebagai salah satu keunggulan bersaing",
        ]);
    }
}
