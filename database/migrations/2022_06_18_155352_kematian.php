<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kematian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kematian', function(Blueprint $table){
            $table->id();
            $table->integer('id_penduduk');
            $table->date('tgl_meninggal')->nullable();
            $table->string('tempat_kematian')->nullable();
            $table->text('sebab')->nullable();
            $table->string('pelapor')->nullable();
            $table->string('hubungan_pelapor')->nullable();
            $table->text('surat_kematian')->nullable();
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
        Schema::dropIfExists('kematian');
    }
}
