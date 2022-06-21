<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kelahiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahiran', function(Blueprint $table){
            $table->id();
            $table->integer('id_penduduk');
            $table->date('tgl_lahir')->nullable();
            $table->string('jenkel')->nullable();
            $table->string('nama_bayi')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('penolong')->nullable();
            $table->text('surat_lahir')->nullable();
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
        Schema::dropIfExists('kelahiran');
    }
}
