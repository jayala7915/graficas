<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar {
            width: 100%;
            background:rgb(85, 79, 138);
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            height: 60px;
            z-index: 1000; /* Para mantenerlo encima */
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #2C3E50;
            color: white;
            padding: 20px;
            position: fixed;
            top: 60px; /* Para que no se solape con el navbar */
            left: 0;
            overflow-y: auto; /* Si el contenido es largo, se mantiene scrollable */
        }
        .sidebar .logo {
            display: flex;
            justify-content: center;
        }
        .sidebar .logo img {
            width: 150px; /* Ajusta el tamaño según necesites */
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .sidebar ul li a i {
            margin-right: 10px;
        }
        .content {
            flex-grow: 1;
            padding: 80px 20px 20px; /* Espacio para el navbar */
            margin-left: 250px; /* Evita que el contenido se sobreponga */
        }
    </style>
</head>
<body>
@if (!Request::is('login') && !Request::is('register'))
    <!-- Navbar fijo -->
    <div class="navbar">
        <div><strong>Panel de Administración</strong></div>
        @auth
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>
@endif
    <!-- Sidebar estático -->
    @if (!Request::is('login') && !Request::is('register'))
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"> <!-- Agrega aquí tu imagen -->
            </div>
            <ul>
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                @auth
                    <li><a href="{{ route('titulos.index') }}"><i class="fa fa-text-height"></i> Configuración titulos landing</a></li>
                    <li><a href="{{ route('carousel.index') }}"><i class="fa fa-columns"></i> Carousel principal</a></li>
                    <li><a href="{{ route('seccion-media.index') }}"><i class="fa fa-bandcamp"></i> Configuración contenedor secundario</a></li>
                    <li><a href="{{ route('imagen-seccion-media.index') }}"><i class="fa fa-file-image-o"></i> Configuración imagen contenedor </a></li>
                    <li><a href="{{ route('mision-vision.index') }}"><i class="fa fa-file-text"></i> Configuración descripcion empresa</a></li>
                    <li><a href="{{ route('conoce-mas.index') }}"><i class="fa fa-plus"></i> Configuración conoce mas</a></li>
                    <li><a href="{{ route('historias-empresa.index') }}"><i class="fa fa-map-o"></i> Configuración historia</a></li>
                    <li><a href="{{ route('directorios.index') }}"><i class="fa fa-university"></i> Configuración directorio</a></li>
                    <li><a href="{{ route('servicios.index') }}"><i class="fa fa-server"></i> Configuración servicios</a></li>
                    <li><a href="{{ route('socios.index') }}"><i class="fa fa-volume-control-phone"></i> Configuración contactos</a></li>
                @endauth
            </ul>
        </div>
    @endif

    <div class="content">
        @yield('content')
    </div>
</body>
</html>