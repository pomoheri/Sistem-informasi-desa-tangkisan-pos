<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penduduk extends Model
{
    use HasFactory;

    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'penduduk';

    protected $guarded = [];

    public function pendudukDatang(){
        return $this->hasOne('App\Models\PendudukDatang', 'id_penduduk');
    }
    public function pendudukKeluar(){
        return $this->hasOne('App\Models\PendudukDatang', 'id_penduduk');
    }
    public function kelahiran(){
        return $this->hasOne('App\Models\Kelahiran', 'id_penduduk');
    }
    public function kematian(){
        return $this->hasOne('App\Models\Kematian', 'id_penduduk');
    }
}
