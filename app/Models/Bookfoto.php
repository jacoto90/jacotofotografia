<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookfoto extends Model
{
    protected $table = 'bookfotos';
    protected $primaryKey = 'idbookfotos';

    protected $fillable = [
        'nombrebook',
        'idcliente',
        'pwd',
    ];

    protected $hidden = ['pwd'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente');
    }
}
