<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     
    <style>
        /* Estilos base mejorados */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.9rem; /* Texto más pequeño */
        }
        
        /* Navbar mejorado */
        .navbar {
            width: 100%;
            background: rgb(85, 79, 138);
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            height: 60px;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            transition: opacity 0.3s;
            font-size: 0.9rem; /* Texto más pequeño */
        }
        
        /* Sidebar más ancho y con mejor scroll */
        .sidebar {
            width: 280px; /* Más ancho que antes */
            height: calc(100vh - 60px);
            background: #2C3E50;
            color: white;
            padding: 20px 0;
            position: fixed;
            top: 60px;
            left: 0;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 999;
            display: flex;
            flex-direction: column;
        }
        
        /* Scrollbar personalizada */
        .sidebar::-webkit-scrollbar {
            width: 8px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: #1a252f;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgb(85, 79, 138);
            border-radius: 4px;
        }
        
        .sidebar .logo {
            display: flex;
            justify-content: center;
            padding: 0 20px 20px;
            flex-shrink: 0;
        }
        
        .sidebar .logo img {
            width: 180px;
            max-width: 100%;
            height: auto;
        }
        
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
            overflow-y: auto;
            padding-bottom: 20px; /* Espacio para que no quede pegado al final */
        }
        
        .sidebar ul li {
            padding: 12px 25px; /* Más padding lateral */
            transition: background-color 0.3s;
        }
        
        .sidebar ul li:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            white-space: nowrap;
            font-size: 0.9rem; /* Texto más pequeño */
        }
        
        .sidebar ul li a i {
            margin-right: 15px;
            font-size: 1rem; /* Iconos un poco más pequeños */
            min-width: 24px;
            text-align: center;
        }
        
        .sidebar ul li a span {
            transition: opacity 0.3s;
        }
        
        /* Contenedor principal mejorado */
        .main-container {
            flex-grow: 1;
            margin-left: 280px; /* Ajustado al nuevo ancho del sidebar */
            padding: 80px 20px 20px;
            transition: margin-left 0.3s;
            max-width: 100%;
            overflow-x: hidden;
        }
        
        /* Contenedor del contenido adaptable */
        .content-container {
            max-width: 1400px; /* Ancho máximo para contenido */
            margin: 0 auto;
            width: 100%;
            padding: 0 15px;
        }
        
        /* Botón hamburguesa */
        .navbar-toggler {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.3rem; /* Un poco más pequeño */
            cursor: pointer;
            padding: 5px 10px;
        }
        
        /* Versión tablet - Menú de iconos */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px; /* Un poco más ancho que antes */
            }
            
            .sidebar .logo img {
                width: 50px;
            }
            
            .sidebar ul li {
                padding: 12px 20px; /* Ajuste de padding */
                text-align: center;
            }
            
            .sidebar ul li a span {
                opacity: 0;
                position: absolute;
                left: -1000px;
            }
            
            .sidebar ul li a i {
                margin-right: 0;
                font-size: 1.2rem;
            }
            
            .main-container {
                margin-left: 80px;
            }
            
            .navbar-toggler {
                display: block;
            }
        }
        
        /* Versión móvil - Menú oculto */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-container {
                margin-left: 0;
            }
            
            .sidebar ul li a span {
                opacity: 1;
                position: static;
            }
        }
        
        /* Estilos para el modal PDF */
        .modal-fullscreen {
            max-width: 90%;
            width: 90%;
            margin: auto;
            top: 5vh;
        }
        
        .modal-content {
            height: 90vh;
            display: flex;
            flex-direction: column;
            font-size: 0.9rem; /* Texto más pequeño */
        }
        
        /* Otros ajustes */
        .card-button {
            font-size: 0.9rem; /* Texto más pequeño */
        }
    </style>
</head>
<body>
@if (!Request::is('login') && !Request::is('register'))
    <!-- Navbar fijo mejorado -->
    <div class="navbar">
        <button class="navbar-toggler" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <div><strong>Panel de Administración</strong></div>
        @auth
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> <span class="d-none d-md-inline">Cerrar sesión</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>
@endif

    <!-- Sidebar mejorado -->
    @if (!Request::is('login') && !Request::is('register'))
        <div class="sidebar" id="sidebar">
            <div class="logo">
                <img src="{{ asset('storage/Logo_Original2.png') }}" alt="Logo">
            </div>
            <ul>
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> <span>Inicio</span></a></li>
                @auth
                    <li><a href="{{ route('titulos.index') }}"><i class="fas fa-text-height"></i> <span>Configuración títulos</span></a></li>
                    <li><a href="{{ route('carousel.index') }}"><i class="fas fa-columns"></i> <span>Carousel principal</span></a></li>
                    <li><a href="{{ route('seccion-media.index') }}"><i class="fas fa-bandcamp"></i> <span>Contenedor secundario</span></a></li>
                    <li><a href="{{ route('imagen-seccion-media.index') }}"><i class="fas fa-file-image"></i> <span>Imagen contenedor</span></a></li>
                    <li><a href="{{ route('mision-vision.index') }}"><i class="fas fa-file-text"></i> <span>Descripción empresa</span></a></li>
                    <li><a href="{{ route('conoce-mas.index') }}"><i class="fas fa-plus"></i> <span>Conoce más</span></a></li>
                    <li><a href="{{ route('historias-empresa.index') }}"><i class="fas fa-map"></i> <span>Historia</span></a></li>
                    <li><a href="{{ route('directorios.index') }}"><i class="fas fa-university"></i> <span>Directorio</span></a></li>
                    <li><a href="{{ route('servicios.index') }}"><i class="fas fa-server"></i> <span>Servicios</span></a></li>
                    <li><a href="{{ route('socios.index') }}"><i class="fas fa-phone"></i> <span>Contactos</span></a></li>
                    <li><a href="{{ route('documentos.index') }}"><i class="fas fa-file-pdf"></i> <span>Documentación</span></a></li>
                    <li><a href="{{ route('ofertas-laborales.index') }}"><i class="fas fa-briefcase"></i> <span>Ofertas Laborales</span></a></li>
                @endauth
            </ul>
        </div>
    @endif

    <!-- Modal PDF (mantener igual) -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-hidden="true">
        <!-- ... -->
    </div>

    <!-- Contenedor principal mejorado -->
    <div class="main-container">
        <div class="content-container">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle del sidebar mejorado
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
            
            // Ajustar el padding del cuerpo cuando el menú está abierto
            if (window.innerWidth <= 768) {
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : 'auto';
            }
        });
        
        // Cerrar sidebar al hacer clic en un enlace (en móviles)
        if (window.innerWidth <= 768) {
            document.querySelectorAll('#sidebar a').forEach(link => {
                link.addEventListener('click', () => {
                    document.getElementById('sidebar').classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            });
        }
        
        // Ajustar dinámicamente al cambiar tamaño de pantalla
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth > 768 && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
        
        // Configuración de PDF.js (mantener igual)
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';
        // ... resto del código JavaScript para el PDF viewer
    </script>
</body>
</html>
















