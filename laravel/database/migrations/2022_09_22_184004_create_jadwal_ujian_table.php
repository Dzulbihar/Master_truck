<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ujian', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name')->nullable();
            $table->string('pic_nama')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('drive_license')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('status')->default('Belum Ujian');
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
        Schema::dropIfExists('jadwal_ujian');
    }
}
