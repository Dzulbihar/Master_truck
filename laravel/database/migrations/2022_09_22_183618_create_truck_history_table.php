<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_history', function (Blueprint $table) {
            $table->id();

            $table->string('penghapus');
            $table->string('alasan_dihapus');

            $table->foreignId('company_id')->nullable();                        
            $table->string('status')->nullable();  

            $table->string('owner_name')->nullable();
            $table->string('pic_nama')->nullable();                             
            $table->string('email')->nullable();                                
            
            $table->string('police_no')->nullable();  
            $table->string('stnk_no')->nullable();
            $table->string('machine_no')->nullable();
            $table->string('design_no')->nullable();
            $table->date('expired_lisence')->nullable();                        
            $table->string('foto_stnk')->nullable();                            

            $table->string('trade_mark')->nullable();
            $table->string('year_made')->nullable();
            $table->string('state')->nullable();

            $table->integer('truck_weight')->nullable();
            $table->string('foto_truck')->nullable();                    
            $table->string('foto_kir_truck')->nullable();                

            $table->string('chassis_code')->nullable();
            $table->string('jenis_chassis')->nullable();                   
            $table->integer('chassis_weight')->nullable();                  
            $table->string('foto_chassis')->nullable();  
            $table->string('foto_kir_chassis')->nullable();                 

            $table->string('id_customer')->nullable(); 
            $table->string('customer')->nullable();  
            $table->string('site_id')->nullable(); 
            $table->string('truck_code')->nullable();
            $table->date('upd_ts')->nullable();
            $table->string('opername')->nullable();
            $table->string('gate_no')->nullable();
            $table->integer('total_weiht_ht_ch')->nullable();
            $table->string('bbg_yn')->nullable(); 
            $table->string('otl_yn')->nullable(); 
            $table->string('id_rfid')->nullable(); 

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
        Schema::dropIfExists('truck_history');
    }
}
