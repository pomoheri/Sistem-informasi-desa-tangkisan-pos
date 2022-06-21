<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukKeluar extends Model
{
    use HasFactory;

    protected $table = 'penduduk_keluar';

    protected $guarded = [];

    public function Penduduk(){
        return $this->belongsTo('App\Models\Penduduk', 'id_penduduk');
    }
}
