<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_ujians', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('driver_id');
            $table->string('nama_pertanyaan')->nullable();
            $table->string('isi_pertanyaan')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('status')->default('Aktif');
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
        Schema::dropIfExists('materi_ujians');
    }
}
