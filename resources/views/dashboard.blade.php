@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<section class="dashboard-page">

    <!-- BIENVENIDA -->
    <section class="dashboard-top">
        <div class="row">

            <div class="col-12">
                <div class="dashboard-welcome">
                    <h2>Bienvenido, {{ auth()->user()->name }}</h2>
                    <p>Rol: {{ auth()->user()->role }}</p>
                </div>
            </div>

        </div>
    </section>

    <!-- TARJETAS -->
    <section class="dashboard-stats">
        <div class="row g-4">

            <div class="col-12 col-md-4">
                <div class="card stat-card stat-primary">
                    <div class="card-body">
                        <h5>Total Productos</h5>
                        <h2>{{ $totalProductos ?? 0 }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card stat-card stat-warning">
                    <div class="card-body">
                        <h5>Stock Crítico</h5>
                        <h2>{{ $productosCriticos ?? 0 }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card stat-card stat-success">
                    <div class="card-body">
                        <h5>Movimientos Hoy</h5>
                        <h2>{{ $movimientosHoy ?? 0 }}</h2>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ACCESOS -->
    <section class="dashboard-actions mt-4">
        <div class="row">

            <div class="col-12">
                <div class="card access-card">

                    <div class="card-header">
                        <h4>Accesos Rápidos</h4>
                    </div>

                    <div class="card-body action-buttons">

                        <a href="{{ route('productos.index') }}" class="btn action-btn">
                            Gestionar Productos
                        </a>

                        <a href="{{ route('movimientos.index') }}" class="btn action-btn">
                            Ver Movimientos
                        </a>

                        <a href="{{ route('stock.critico') }}" class="btn action-btn">
                            Ver Stock Crítico
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </section>

</section>

@endsection