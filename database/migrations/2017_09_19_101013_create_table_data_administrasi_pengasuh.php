<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataAdministrasiPengasuh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_administrasi_pengasuh', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_kartu_keluarga');
            $table->string('nomor_kartu_tanda_penduduk');
            $table->string('image_kartu_keluarga');
            $table->string('image_kartu_tanda_penduduk');
            $table->string('image_slip_gaji');
            $table->integer('id_pengasuh');
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
        Schema::drop('data_administrasi_pengasuh');
    }
}
