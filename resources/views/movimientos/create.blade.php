@extends('layouts.app')

@section('title', 'Nuevo Movimiento')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Registrar Movimiento</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('movimientos.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Producto *</label>
                        <select name="producto_id" class="form-control @error('producto_id') is-invalid @enderror" required>
                            <option value="">Seleccionar producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" 
                                    {{ request('producto_id') == $producto->id ? 'selected' : '' }}>
                                    {{ $producto->codigo }} - {{ $producto->nombre }} 
                                    (Stock: {{ $producto->calcularStock() }})
                                </option>
                            @endforeach
                        </select>
                        @error('producto_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Tipo de Movimiento *</label>
                        <select name="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                            <option value="">Seleccionar tipo</option>
                            <option value="entrada" {{ request('tipo') == 'entrada' ? 'selected' : '' }}>📥 Entrada (Ingreso)</option>
                            <option value="salida" {{ request('tipo') == 'salida' ? 'selected' : '' }}>📤 Salida (Salida)</option>
                        </select>
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Cantidad *</label>
                        <input type="number" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" 
                               min="1" value="{{ old('cantidad', 1) }}" required>
                        @error('cantidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Motivo</label>
                        <textarea name="motivo" class="form-control @error('motivo') is-invalid @enderror" 
                                  rows="3" placeholder="Ej: Compra a proveedor, Venta, Ajuste de inventario...">{{ old('motivo') }}</textarea>
                        @error('motivo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Registrar Movimiento</button>
                    <a href="{{ route('movimientos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection