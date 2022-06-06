<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfilDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_desa', function(Blueprint $table){
            $table->id();
            $table->string('nama_desa',50);
            $table->string('no_telp')->nullable();
            $table->string('nama_lurah')->nullable();
            $table->text('alamat_desa')->nullable();
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
        Schema::dropIfExists('profil_desa');
    }
}
