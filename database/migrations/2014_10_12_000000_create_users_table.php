<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->enum('agama', ['kristen', 'katolik', 'islam', 'budha', 'hindu', 'konghucu']);
            $table->string('suku')->nullable();
            $table->string('pendidikan_tertinggi')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->enum('pendapatan', ['< Rp. 5.000.000,-', 'Rp. 5.000.000,-  s/d  Rp. 10.000.000,-', 'Rp. 10.000.000,-  s/d  Rp. 20.000.000,-', '>  Rp. 20.000.000,-']);
            $table->string('image')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address')->nullable();
            $table->enum('status', ['active', 'not-active']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
