<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->string('owner_name');
            $table->string('contact')->nullable();
            $table->string('addr_company')->nullable();
            $table->string('nib_company')->nullable();
            $table->string('file_nib_company')->nullable();
            $table->string('npwp_company')->nullable();
            $table->string('file_npwp_company')->nullable();
            $table->string('pmku_company')->nullable();
            $table->string('file_pmku_company')->nullable();

            $table->string('pic_nama')->nullable();
            $table->string('pic_contact')->nullable();
            $table->string('email')->nullable();
            $table->string('statement_form')->nullable();
            
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
        Schema::dropIfExists('company');
    }
}
