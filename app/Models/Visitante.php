<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $table = 'visitantes';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'mensaje',
        'mobil',
        'gestionado',
    ];
}
