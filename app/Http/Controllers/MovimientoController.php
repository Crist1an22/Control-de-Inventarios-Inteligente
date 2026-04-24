<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with('producto', 'responsable')
            ->latest()
            ->paginate(20);
        
        return view('movimientos.index', compact('movimientos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('movimientos.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tipo' => 'required|in:entrada,salida',
            'cantidad' => 'required|integer|min:1',
            'motivo' => 'nullable|string'
        ]);

        // Verificar stock disponible para salidas
        $producto = Producto::find($request->producto_id);
        $stockActual = $producto->calcularStock();

        if ($request->tipo == 'salida' && $stockActual < $request->cantidad) {
            return back()->with('error', 'Stock insuficiente. Stock actual: ' . $stockActual);
        }

        // Crear movimiento
        Movimiento::create([
            'producto_id' => $request->producto_id,
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'motivo' => $request->motivo,
            'responsable_id' => auth()->id()
        ]);

        // Limpiar cache del stock
        Cache::forget("producto_{$request->producto_id}_stock");

        $mensaje = $request->tipo == 'entrada' 
            ? 'Entrada registrada correctamente' 
            : 'Salida registrada correctamente';

        return redirect()->route('movimientos.index')
            ->with('success', $mensaje);
    }
}