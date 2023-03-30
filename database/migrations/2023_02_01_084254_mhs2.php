<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas2', function (Blueprint $table) {
            $table->increments('id_mahasiswa');
            $table->char('nama');
            $table->char('jurusan');
            $table->char('periode');
            $table->char('email');
            $table->char('password');
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
        Schema::table('mahasiswas2', function(Blueprint $table){
            $table->dropColumn([
                'nama',
                'jurusan',
                'periode',
                'email',
                'password'
            ]);
        });
    }
};
