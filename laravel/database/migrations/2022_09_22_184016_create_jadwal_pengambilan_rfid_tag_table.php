<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPengambilanRfidTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pengambilan_rfid_tag', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name')->nullable();
            $table->string('pic_nama')->nullable();
            $table->string('email')->nullable();
            $table->string('police_no')->nullable();
            $table->string('id_rfid')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('status')->default('Belum Diambil');
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
        Schema::dropIfExists('jadwal_pengambilan_rfid_tag');
    }
}
