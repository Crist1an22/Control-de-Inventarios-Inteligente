<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Movimiento;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductos = Producto::count();
        $movimientosHoy = Movimiento::whereDate('created_at', today())->count();
        
        $productos = Producto::all();
        $productosCriticos = 0;
        $valorInventario = 0;
        
        foreach($productos as $producto) {
            $stock = $producto->calcularStock();
            if($stock < $producto->stock_minimo) {
                $productosCriticos++;
            }
            $valorInventario += $stock * $producto->precio;
        }
        
        $ultimosProductos = Producto::latest()->take(5)->get();
        $ultimosMovimientos = Movimiento::with('producto')->latest()->take(5)->get();
        
        return view('dashboard', compact(
            'totalProductos', 'productosCriticos', 'movimientosHoy', 
            'valorInventario', 'ultimosProductos', 'ultimosMovimientos'
        ));
    }
}