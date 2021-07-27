<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('nama_pengguna');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level');
            $table->timestamps();
        });
        DB::table('tb_pengguna')->insert([
            'nama_pengguna'=>"Mulyana",
            'email'=>"agnianyamullyana@gmail.com",
            'password'=>"admin",
            'level'=>"admin",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pengguna');
    }
}
