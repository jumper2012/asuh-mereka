<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('image');
            $table->date('tanggal_lahir');
            $table->integer('tempat_lahir');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->string('agama');
            $table->string('suku');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('alamat');
            $table->text('deskripsi');
            $table->integer('admin_id');
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
        Schema::drop('anaks');
    }
}
