@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Editar Producto</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('productos.update', $producto) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Código *</label>
                        <input type="text" name="codigo" class="form-control" value="{{ $producto->codigo }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nombre *</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Precio *</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="{{ $producto->precio }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Stock Mínimo *</label>
                        <input type="number" name="stock_minimo" class="form-control" value="{{ $producto->stock_minimo }}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection