<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('company_id');
            $table->string('status')->default('Proses Pengajuan');

            $table->string('owner_name');
            $table->string('email');
            $table->string('pic_nama'); 
              
            $table->string('name');
            $table->string('nik');
            $table->date('birthday');
            // $table->string('birthday')->nullable();
            $table->string('gender');
            $table->string('addr');
            $table->string('hp1');
            $table->string('hp2')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile')->nullable();

            $table->string('drive_license');
            $table->date('valid_date');
            // $table->string('valid_date')->nullable();
            $table->string('display_cust')->default('Y');
            $table->string('done')->default('N');

            $table->string('id_license')->nullable();
            $table->string('id_customer')->nullable(); 
            $table->string('customer')->nullable(); 
            $table->string('site_id')->default('INTPKS');
            $table->string('opername')->nullable();
            $table->date('done_date')->nullable();
            // $table->string('done_date')->nullable();
            $table->date('ins_date')->nullable();
            // $table->string('ins_date')->nullable();
            $table->date('upd_ts')->nullable();
            $table->string('id_rfid')->default('-');

            $table->string('remaks')->nullable();           

            $table->string('statement_form')->nullable();
            $table->string('file_sim');
            $table->string('file_ktp');
            $table->string('file_foto');

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
        Schema::dropIfExists('driver');
    }
}
