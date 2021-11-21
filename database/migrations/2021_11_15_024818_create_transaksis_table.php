<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['masuk', 'keluar'])->default('masuk');
            $table->date('tanggal');
            $table->string('nominal');
            $table->string('keterangan');
            $table->integer('pemasukan_id')->unsiqned()->nullable();
            $table->integer('pengeluaran_id')->unsiqned()->nullable();
            $table->integer('pinjaman_id')->unsiqned()->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
