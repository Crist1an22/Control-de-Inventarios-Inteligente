@extends('layouts.app')

@section('title', 'Stock Critico')

@section('content')

<!-- ================= CONTENEDOR GENERAL ================= -->
<section class="container-fluid stock-page">

    <!-- ================= ENCABEZADO ================= -->
    <section class="stock-header mb-4">
        <div class="row align-items-center">

            <div class="col-12 col-md-6">
                <h2 class="stock-title">Productos con Stock Crítico</h2>
                <p class="stock-subtitle">
                    Consulta productos con existencias por debajo del mínimo.
                </p>
            </div>

            <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
                <a href="{{ route('productos.index') }}" class="btn btn-volver">
                    Volver
                </a>
            </div>

        </div>
    </section>

    <!-- ================= TABLA ================= -->
    <section class="stock-card">

        @if(isset($productosCriticos) && count($productosCriticos) > 0)

            <section class="table-responsive">

                <table class="table stock-table">

                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Stock Actual</th>
                            <th>Stock Mínimo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($productosCriticos as $item)

                        <tr>

                            <td>{{ $item['codigo'] }}</td>

                            <td>{{ $item['nombre'] }}</td>

                            <td>
                                <span class="badge stock-danger">
                                    {{ $item['stock_actual'] }}
                                </span>
                            </td>

                            <td>{{ $item['stock_minimo'] }}</td>

                            <td>
                                <a
                                    href="{{ route('movimientos.create') }}?producto_id={{ $item['id'] }}"
                                    class="btn btn-entrada"
                                >
                                    Registrar Entrada
                                </a>
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </section>

        @else

            <!-- ================= SIN DATOS ================= -->
            <section class="stock-empty">
                <p>No hay productos con stock crítico.</p>
            </section>

        @endif

    </section>

    <!-- ================= FOOTER ================= -->
    <section class="stock-footer mt-5">
        <footer>
            <p>
                Sistema de Inventario © {{ date('Y') }}
            </p>
        </footer>
    </section>

</section>

@endsection