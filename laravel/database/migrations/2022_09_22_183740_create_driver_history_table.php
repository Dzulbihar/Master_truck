<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_history', function (Blueprint $table) {
            $table->id();

            $table->string('penghapus');
            $table->string('alasan_dihapus');

            $table->foreignId('company_id')->nullable();
            $table->string('status')->nullable();

            $table->string('owner_name')->nullable();
            $table->string('email')->nullable();
            $table->string('pic_nama')->nullable();
              
            $table->string('name')->nullable();
            $table->string('nik')->nullable();
            $table->date('birthday')->nullable();
            // $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('addr')->nullable();
            $table->string('hp1')->nullable();
            $table->string('hp2')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile')->nullable();

            $table->string('drive_license')->nullable();
            $table->date('valid_date')->nullable();
            // $table->string('valid_date')->nullable();
            $table->string('display_cust')->nullable();
            $table->string('done')->nullable();

            $table->string('id_license')->nullable();
            $table->string('id_customer')->nullable(); 
            $table->string('customer')->nullable(); 
            $table->string('site_id')->nullable();
            $table->string('opername')->nullable();
            $table->date('done_date')->nullable();
            // $table->string('done_date')->nullable();
            $table->date('ins_date')->nullable();
            // $table->string('ins_date')->nullable();
            $table->date('upd_ts')->nullable();
            $table->string('id_rfid')->nullable();

            $table->string('remaks')->nullable();           

            $table->string('statement_form')->nullable();
            $table->string('file_sim')->nullable();
            $table->string('file_ktp')->nullable();
            $table->string('file_foto')->nullable();

            $table->string('sudah_ujian')->nullable();
            $table->string('lulus_ujian')->nullable();
            $table->string('nilai_ujian')->nullable();

            $table->string('alasan_blokir')->nullable();
            $table->string('tanggal_blokir')->nullable();
            $table->string('nama_blokir')->nullable();
            $table->string('tanggal_pengajuan')->nullable();
            $table->string('tanggal_setujui')->nullable();
            $table->string('nama_setujui')->nullable();
            
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
        Schema::dropIfExists('driver_history');
    }
}
