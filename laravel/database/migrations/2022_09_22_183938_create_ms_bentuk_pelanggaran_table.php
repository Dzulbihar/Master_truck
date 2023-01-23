<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsBentukPelanggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_bentuk_pelanggaran', function (Blueprint $table) {
            $table->string('bentuk_pelanggaran');
            $table->string('bentuk_jenis');
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
        Schema::dropIfExists('ms_bentuk_pelanggaran');
    }
}
