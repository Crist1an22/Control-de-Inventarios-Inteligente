@extends('layouts.app')

@section('title', 'Movimientos')

@section('content')

{{-- ICONOS --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

<!-- ================= CONTENEDOR GENERAL ================= -->
<section class="container-fluid">

    <!-- ================= ENCABEZADO ================= -->
    <section class="mb-4">
        <div class="row align-items-center">

            <div class="col-12 col-md-6">
                <h2>Historial de Movimientos</h2>
                <p>Consulta entradas y salidas del inventario.</p>
            </div>

            <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
                <a href="{{ route('movimientos.create') }}" class="btn btn-primary">
                    + Nuevo Movimiento
                </a>
            </div>

        </div>
    </section>

    <!-- ================= TARJETA PRINCIPAL ================= -->
    <section class="card">

        <section class="card-body">

            @if($movimientos->count() > 0)

                <!-- ================= TABLA RESPONSIVE ================= -->
                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Producto</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($movimientos as $movimiento)

                            <tr>

                                <td>
                                    {{ $movimiento->created_at->format('d/m/Y H:i') }}
                                </td>

                                <td>
                                    {{ $movimiento->producto->nombre }}
                                </td>

                                <td>
                                    @if($movimiento->tipo == 'entrada')

                                        <span class="badge bg-success">
                                            <span class="material-symbols-outlined">
                                                login
                                            </span>
                                            Entrada
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            <span class="material-symbols-outlined">
                                                logout
                                            </span>
                                            Salida
                                        </span>

                                    @endif
                                </td>

                                <td>
                                    {{ $movimiento->cantidad }}
                                </td>

                                <td>
                                    {{ $movimiento->motivo ?? 'Sin motivo' }}
                                </td>

                                <td>
                                    {{ $movimiento->responsable->name }}
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <!-- ================= PAGINACIÓN ================= -->
                <section class="mt-4">
                    {{ $movimientos->links() }}
                </section>

            @else

                <!-- ================= ALERTA ================= -->
                <section class="alert alert-info">
                    No hay movimientos registrados.
                </section>

            @endif

        </section>

    </section>

    <!-- ================= RESUMEN ================= -->
    <section class="mt-4">
        <div class="row g-3">

            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Total Registros</h5>
                        <p>{{ $movimientos->total() }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Entradas</h5>
                        <p>Control de ingresos</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Salidas</h5>
                        <p>Control de egresos</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <section class="mt-5">
        <footer class="text-center py-4">
            <p class="mb-0">
                Sistema de Inventario © {{ date('Y') }}
            </p>
        </footer>
    </section>

</section>

@endsection