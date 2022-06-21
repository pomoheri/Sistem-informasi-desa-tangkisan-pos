<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendudukKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk_keluar', function(Blueprint $table){
            $table->id();
            $table->integer('id_penduduk');
            $table->string('rt_asal')->nullable();
            $table->string('rw_asal')->nullable();
            $table->string('desa_tujuan')->nullable();
            $table->string('kecamatan_tujuan')->nullable();
            $table->string('kabupaten_tujuan')->nullable();
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
        Schema::dropIfExists('penduduk_keluar');
    }
}
