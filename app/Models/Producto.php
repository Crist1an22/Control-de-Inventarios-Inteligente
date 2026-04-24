<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Producto extends Model
{
    protected $fillable = [
        'codigo', 'nombre', 'categoria_id', 'precio', 'stock_minimo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function calcularStock()
    {
        return Cache::remember("producto_{$this->id}_stock", 300, function() {
            $entradas = $this->movimientos()->where('tipo', 'entrada')->sum('cantidad');
            $salidas = $this->movimientos()->where('tipo', 'salida')->sum('cantidad');
            return $entradas - $salidas;
        });
    }

    public function isStockCritico()
    {
        return $this->calcularStock() < $this->stock_minimo;
    }
}