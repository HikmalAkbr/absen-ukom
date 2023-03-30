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
        Schema::create('absens2', function (Blueprint $table) {
            $table->increments('id_absen');
            $table->char('nama');
            $table->char('jurusan');     
            $table->enum('status',['Hadir', 'Izin', 'Sakit']);
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
        Schema::dropIfExists('absens2');
    }
};
