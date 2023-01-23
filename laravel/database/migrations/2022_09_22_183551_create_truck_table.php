<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id');                        //
            $table->string('status')->default('Proses Pengajuan');  //

            $table->string('owner_name');
            $table->string('pic_nama');                             //
            $table->string('email');                                //
            
            $table->string('police_no');  
            $table->string('stnk_no');
            $table->string('machine_no');
            $table->string('design_no');
            $table->date('expired_lisence');                        
            $table->string('foto_stnk');                            //

            $table->string('trade_mark');
            $table->string('year_made');
            $table->string('state');

            $table->integer('truck_weight');
            $table->string('foto_truck');                    //
            $table->string('foto_kir_truck');                //

            $table->string('chassis_code');
            $table->string('jenis_chassis');                   //
            $table->integer('chassis_weight');                  //
            $table->string('foto_chassis');                    //
            $table->string('foto_kir_chassis');                //

            $table->string('id_customer')->nullable(); 
            $table->string('customer')->nullable();  
            $table->string('site_id')->default('INTPKS');
            $table->string('truck_code')->nullable();
            $table->date('upd_ts')->nullable();
            $table->string('opername')->nullable();
            $table->string('gate_no')->nullable();
            $table->integer('total_weiht_ht_ch')->nullable();
            $table->string('bbg_yn')->default('N');
            $table->string('otl_yn')->default('N');
            $table->string('id_rfid')->default('-');

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
        Schema::dropIfExists('truck');
    }
}
