<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranbarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranbarangs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('user_id');
            $table->integer('barang_id');
            $table->integer('jumlah');
            $table->enum('jenis', ['tambah', 'kurang']);
            $table->string('eviden')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('tranbarangs');
    }
}
