<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk',function (Blueprint $table){
            $table->id();
            $table->string('nik',16);
            $table->string('nama',75);
            $table->text('alamat')->nullable();
            $table->string('jenkel',1);
            $table->date('tgl_lahir');
            $table->string('tempat_lahir',100);
            $table->string('agama',15)->nullable();
            $table->string('pendidikan', 25)->nullable();
            $table->string('status',30)->nullable();
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
        Schema::dropIfexists('penduduk');
    }
}
