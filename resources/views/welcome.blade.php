
<!DOCTYPE html>
<html lang="es">

<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quicksand:wght@300..700&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Inventarios</title>

    {{-- CONEXIÓN CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<!-- ================= HEADER ================= -->
<header class="header-esmeralda">

    <section class="container-fluid">

        <section class="row align-items-center">

            <!-- LOGO -->
            <section class="col-12 col-md-6 text-center text-md-start mb-3 mb-md-0">

                <a href="/" class="text-decoration-none">
                    <h1>Control de Inventarios</h1>
                </a>

            </section>

            <!-- MENÚ -->
            <section class="col-12 col-md-6 text-center text-md-end">

                @if (Route::has('login'))

                    @auth

                        <a href="{{ url('/dashboard') }}" class="btn btn-success me-2">
                            Dashboard
                        </a>

                    @else

                        <a href="{{ route('login') }}" class="btn btn-dark me-2">
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="btn btn-outline-dark">
                                Registrarse
                            </a>

                        @endif

                    @endauth

                @endif

            </section>

        </section>

    </section>

</header>

<!-- ================= HERO ================= -->
<section class="frase-container">

    <section class="container">

        <section class="row justify-content-center">

            <section class="col-12 col-lg-10">

                <div class="frase-box">

                    <h2>Sistema de Control de Inventarios</h2>

                    <p class="text-white mt-4 fs-5">
                        Gestiona tus productos, movimientos y stock de manera inteligente
                    </p>

                    <div class="mt-4">

                        @guest

                            <a href="{{ route('register') }}" class="btn btn-light me-2">
                                Comenzar Ahora
                            </a>

                            <a href="{{ route('login') }}" class="btn btn-outline-light">
                                Iniciar Sesión
                            </a>

                        @else

                            <a href="{{ url('/dashboard') }}" class="btn btn-light">
                                Ir al Dashboard
                            </a>

                        @endguest

                    </div>

                </div>

            </section>

        </section>

    </section>

</section>

<!-- ================= FEATURES ================= -->
<section class="vendidos-container">

    <section class="container">

        <section class="row g-4">

            <section class="col-12 col-sm-6 col-lg-3">
                <div class="joya">
                    <h4>CRUD de Productos</h4>
                    <p>Gestiona tu catálogo de productos</p>
                </div>
            </section>

            <section class="col-12 col-sm-6 col-lg-3">
                <div class="joya">
                    <h4>Movimientos</h4>
                    <p>Registra entradas y salidas</p>
                </div>
            </section>

            <section class="col-12 col-sm-6 col-lg-3">
                <div class="joya">
                    <h4>Stock Automático</h4>
                    <p>Cálculo en tiempo real</p>
                </div>
            </section>

            <section class="col-12 col-sm-6 col-lg-3">
                <div class="joya">
                    <h4>Alertas</h4>
                    <p>Notificaciones de stock bajo</p>
                </div>
            </section>

        </section>

    </section>

</section>

<!-- ================= FOOTER ================= -->
<footer class="footer-section">

    <section class="container footer-container">

        <section class="row text-center text-md-start">

            <section class="col-12 col-md-6 mb-3 mb-md-0">
                <h5>Control de Inventarios</h5>
                <p>Gestión moderna y eficiente.</p>
            </section>

            <section class="col-12 col-md-6 text-md-end">
                <p>Sistema de Control de Inventarios - {{ date('Y') }}</p>
            </section>

        </section>

    </section>

</footer>

</body>
</html>