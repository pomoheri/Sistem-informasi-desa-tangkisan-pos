<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilDesa extends Model
{
    use HasFactory;

    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'profil_desa';

    protected $guarded = [];
}
