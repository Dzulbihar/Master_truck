<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_ujians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id');
            $table->string('nomor')->nullable();
            $table->string('jawaban_text')->nullable();
            $table->string('jawaban_file')->nullable();
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
        Schema::dropIfExists('proses_ujians');
    }
}
