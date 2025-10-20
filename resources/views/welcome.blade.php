<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa - Inicio</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        /* Estilos personalizados */
        .top-bar {
            background-color: #f8f9fa;
            padding: 8px 0;
            font-size: 0.9rem;
        }
        
        .social-icons a {
            color: #495057;
            margin-right: 15px;
            transition: color 0.3s;
        }
        
        .social-icons a:hover {
            color: #007bff;
        }
        
        .phone-number {
            color: #495057;
        }
        
        .navbar {
            padding: 0.5rem 0;
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .carousel-item {
            height: 500px;
        }
        
        .carousel-item img {
            object-fit: cover;
            height: 100%;
        }
        
        /* Estilos para hacer la barra superior y navbar fijos */
        .sticky-top-bar {
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        
        /* Ajustes para dispositivos móviles */
        @media (max-width: 768px) {
            .top-bar {
                padding: 5px 0;
                font-size: 0.8rem;
            }
            
            .carousel-item {
                height: 300px;
            }
            
            .navbar-brand {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Barra superior con redes sociales y teléfono -->
    <div class="sticky-top-bar">
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="social-icons">
                            <a href="#" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" title="Twitter"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <span class="phone-number">
                            <i class="bi bi-phone"></i> (123) 456-7890
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjYwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0ZXh0IHg9IjEwIiB5PSIzNSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjI0IiBmb250LXdlaWdodD0iYm9sZCI+TUkgRU1QUkVTQTwvdGV4dD48L3N2Zz4=" alt="Logo Empresa" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Carrusel -->
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="Oficina moderna">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bienvenido a nuestra empresa</h5>
                    <p>Soluciones innovadoras para tu negocio</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="Equipo de trabajo">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nuestros Servicios</h5>
                    <p>Conoce todo lo que podemos hacer por ti</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="Atención al cliente">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Contáctanos</h5>
                    <p>Estamos listos para ayudarte</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Contenido de ejemplo (opcional) -->
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Nuestra Empresa</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>