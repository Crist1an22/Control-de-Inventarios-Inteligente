@extends('layouts.app')

@section('title', 'Ver Producto')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $producto->nombre }}</h3>
    </div>
    <div class="card-body">
        <p><strong>Código:</strong> {{ $producto->codigo }}</p>
        <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
        <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
        <p><strong>Stock Actual:</strong> {{ $producto->calcularStock() }}</p>
        <p><strong>Stock Mínimo:</strong> {{ $producto->stock_minimo }}</p>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection