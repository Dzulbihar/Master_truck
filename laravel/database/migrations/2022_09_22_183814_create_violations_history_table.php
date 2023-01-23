<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations_history', function (Blueprint $table) {
            $table->id();

            $table->string('penghapus');
            $table->string('alasan_dihapus');

            $table->foreignId('driver_id')->nullable();

            $table->string('nama_perusahaan')->nullable();
            $table->string('nama_driver')->nullable();

            $table->string('bentuk_pelanggaran')->nullable();
            $table->string('jenis_pelanggaran')->nullable();

            $table->string('alasan')->nullable();
            $table->string('kapan')->nullable();
            $table->string('dimana')->nullable();

            $table->string('jumlah_kejadian')->nullable();
            $table->string('pelanggaran')->nullable();

            $table->string('foto')->nullable();
            $table->string('police_no')->nullable();

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
        Schema::dropIfExists('violations_history');
    }
}
