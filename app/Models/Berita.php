<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'berita';

    protected $guarded = [];
    
}
