<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendudukDatang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk_datang', function(Blueprint $table){
            $table->id();
            $table->integer('id_penduduk');
            $table->string('rt_tujuan')->nullable();
            $table->string('rw_tujuan')->nullable();
            $table->string('rt_asal')->nullable();
            $table->string('rw_asal')->nullable();
            $table->string('desa_asal')->nullable();
            $table->string('kecamatan_asal')->nullable();
            $table->text('alasan_pindah')->nullable();
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
        Schema::dropIfExists('penduduk_datang');
    }
}
