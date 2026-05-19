<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'idcliente';

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
    ];

    public function bookfotos()
    {
        return $this->hasMany(Bookfoto::class, 'idcliente');
    }
}
