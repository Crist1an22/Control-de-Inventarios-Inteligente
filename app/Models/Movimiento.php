<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $fillable = [
        'producto_id',
        'tipo',
        'cantidad',
        'motivo',
        'responsable_id'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}