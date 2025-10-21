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
        
   /* Grid automático de 5 en 5 */
.socios-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    justify-items: center;
    align-items: center;
}

/* Logos en gris */
.socios-logo {
    filter: grayscale(100%);
    transition: filter 0.3s ease;
    max-height: 120px;
    object-fit: contain;
}

/* Opción: al pasar el mouse se colorean */
.socios-logo:hover {
    filter: grayscale(0%);
}

/* Responsivo */
@media (max-width: 992px) {
    .socios-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
@media (max-width: 576px) {
    .socios-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

 .section-title {
      font-weight: 700;
      font-size: 2rem;
    }
    .section-subtitle {
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.9rem;
      color: #666;
      letter-spacing: 1px;
    }
    .highlight {
      font-weight: bold;
    }
    .custom-btn {
      border: 1px solid #0d6efd;
      color: #0d6efd;
      background: transparent;
      border-radius: 25px;
      padding: 8px 20px;
      font-size: 0.9rem;
      transition: all 0.3s ease;
    }
    .custom-btn:hover {
      background: #0d6efd;
      color: #fff;
    }



 .catalogo-section {
      background-color: #8d65f7;
      color: white;
      padding: 10px 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
    }

    .catalogo-image {
      max-width: 300px;
      margin-right: 40px;
    }

    .catalogo-content {
      text-align: center;
    }

    .catalogo-title {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .catalogo-year {
      font-size: 72px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .catalogo-buttons {
      display: flex;
      gap: 15px;
      justify-content: center;
    }

    .catalogo-buttons a {
      text-decoration: none;
      background-color: white;
      color: #333;
      padding: 12px 20px;
      border-radius: 30px;
      font-weight: bold;
      transition: background-color 0.3s, color 0.3s;
    }

    .catalogo-buttons a:hover {
      background-color: #ddd;
    }

    @media (max-width: 768px) {
      .catalogo-section {
        flex-direction: column;
        text-align: center;
      }

      .catalogo-image {
        margin-right: 0;
        margin-bottom: 30px;
      }

      .catalogo-year {
        font-size: 48px;
      }
    }
    
    
    
    .cotizacion-section {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #f0f9ff;
      padding: 60px 30px;
    }

    .cotizacion-image {
      max-width: 350px;
      margin-right: 40px;
    }

    .cotizacion-content {
      max-width: 500px;
    }

    .cotizacion-title {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #1a73e8;
    }

    .cotizacion-subtitle {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 30px;
      color: #333;
    }

    .cotizacion-buttons {
      display: flex;
      gap: 15px;
    }

    .cotizacion-buttons a {
      text-decoration: none;
      background-color: #1a73e8;
      color: white;
      padding: 12px 20px;
      border-radius: 30px;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .cotizacion-buttons a:hover {
      background-color: #1669c1;
    }

    @media (max-width: 768px) {
      .cotizacion-section {
        flex-direction: column;
        text-align: center;
      }

      .cotizacion-image {
        margin-right: 0;
        margin-bottom: 30px;
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
             @foreach($carousel as $index => $carousels)
            <div class="carousel-item active">
                <img src="{{ asset('storage/'.$carousels->imagen) }}" class="d-block w-100" alt="Oficina moderna">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{!! $carousels->nombre_titulo !!}</h5>
                    <p>{{$carousels->texto}}</p>
                </div>
            </div>
             @endforeach
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
    <div class="row align-items-center">
      <!-- Imagen izquierda -->
       @foreach($gruposmisionVision as $nombreTitulo => $misionVision)
         @foreach($misionVision as $index => $MV)
      <div class="col-md-6 mb-4 mb-md-0"> 
        <img src="{{ asset('storage/'.$MV->imagen) }}" alt="Equipo Imprimium" class="img-fluid rounded">
      </div>
      <!-- Texto derecha -->
      <div class="col-md-6">
        
        <p>{!! $nombreTitulo !!}</p>
        
        <p>
          {!! $MV->texto !!}
        </p>
        <!--
        <div class="d-flex gap-3 mt-4">
          <button class="custom-btn">⭐ Beneficios para ti</button>
          <button class="custom-btn">⭐ Beneficios para tus clientes</button>
        </div>
        -->
      </div>
    @endforeach
    @endforeach
    </div>
  </div>


<div class="container my-5">
  <h5 class="text-muted text-uppercase mb-4">¿Qué ofrecemos?</h5>
  <div class="row text-center g-4">
    <!-- Item 1 -->
    <div class="col-6 col-md-4 col-lg-2">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4uJROaWlqGqy2IGTaTzQFjlUjLXI4nIR32A&s" alt="Empaques" class="img-fluid mb-2">
      <p class="fw-semibold text-uppercase small">Empaques</p>
    </div>
    <!-- Item 2 -->
    <div class="col-6 col-md-4 col-lg-2">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4uJROaWlqGqy2IGTaTzQFjlUjLXI4nIR32A&s" alt="Gigantografías" class="img-fluid mb-2">
      <p class="fw-semibold text-uppercase small">Gigantografías</p>
    </div>
    <!-- Item 3 -->
    <div class="col-6 col-md-4 col-lg-2">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4uJROaWlqGqy2IGTaTzQFjlUjLXI4nIR32A&s" alt="Papelería" class="img-fluid mb-2">
      <p class="fw-semibold text-uppercase small">Papelería</p>
    </div>
    <!-- Item 4 -->
    <div class="col-6 col-md-4 col-lg-2">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4uJROaWlqGqy2IGTaTzQFjlUjLXI4nIR32A&s" alt="Material Publicitario" class="img-fluid mb-2">
      <p class="fw-semibold text-uppercase small">Material Publicitario</p>
    </div>
    <!-- Item 5 -->
    <div class="col-6 col-md-4 col-lg-2">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4uJROaWlqGqy2IGTaTzQFjlUjLXI4nIR32A&s" alt="Artículos Promocionales" class="img-fluid mb-2">
      <p class="fw-semibold text-uppercase small">Artículos Promocionales</p>
    </div>
    <!-- Item 6 -->
    <div class="col-6 col-md-4 col-lg-2">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4uJROaWlqGqy2IGTaTzQFjlUjLXI4nIR32A&s" alt="Textiles" class="img-fluid mb-2">
      <p class="fw-semibold text-uppercase small">Textiles</p>
    </div>
  </div>
</div>



<section class="catalogo-section">
    <!-- Imagen del catálogo -->
    <img src="https://www.pngarts.com/files/13/Catalog-Brochure-PNG-Image-Background.png" alt="Catálogo 2025" class="catalogo-image">

    <!-- Contenido -->
    <div class="catalogo-content">
      <div class="catalogo-title">CATÁLOGO</div>
      <div class="catalogo-year">2025</div>

      <div class="catalogo-buttons">
        <a href="https://tucatalogo-online.com" target="_blank">📖 Ver Online</a>
        <a href="catalogo.pdf" download>⬇️ Descargar PDF</a>
      </div>
    </div>
  </section>




<!-- Sección Socios -->
<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h2>Socios</h2>
        </div>
    </div>
    <div class="socios-grid">
        <img src="https://images.vexels.com/media/users/3/224241/isolated/preview/4d2aacf413b02b74c2cdb75ea41f24d3-programming-diple-logo.png" alt="Socio 1" class="img-fluid socios-logo">
       
        <img src="https://static.vecteezy.com/system/resources/thumbnails/024/553/534/small_2x/lion-head-logo-mascot-wildlife-animal-illustration-generative-ai-png.png" alt="Socio 6" class="img-fluid socios-logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Wikimedia-logo.png" alt="Socio 7" class="img-fluid socios-logo">
        <img src="https://static.vecteezy.com/system/resources/previews/024/553/853/non_2x/colorful-eagle-head-logo-pop-art-style-eagle-face-sticker-pastel-cute-colors-ai-generated-png.png" alt="Socio 8" class="img-fluid socios-logo">
    </div>
</div>




 <section class="cotizacion-section">
    <!-- Imagen de la persona con headset -->
    <img src="https://static.vecteezy.com/system/resources/previews/066/397/967/non_2x/smiling-team-of-call-center-agents-isolated-on-transparent-background-ready-png.png" alt="Asesoría" class="cotizacion-image">

    <!-- Contenido de la cotización -->
    <div class="cotizacion-content">
      <div class="cotizacion-title">¿Necesitas una cotización?</div>
      <div class="cotizacion-subtitle">¡Estamos listos para asesorarte en tu compra!</div>

      <div class="cotizacion-buttons">
        <a href="https://wa.me/1234567890" target="_blank">WhatsApp</a>
        <a href="contacto.html" target="_blank">Online</a>
      </div>
    </div>
  </section>



    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
<footer class="bg-dark text-white pt-4">
  <div class="container">
    <div class="row align-items-start">
      <!-- Logo -->
      <div class="col-12 col-md-3 text-center mb-3 mb-md-0">
        <img src="logo.png" alt="Imprimium Logo" class="img-fluid" style="max-width:80px;">
      </div>

      <!-- Botones -->
      <div class="col-12 col-md-3 mb-3 mb-md-0 border-md-end">
        <ul class="list-unstyled text-center text-md-start">
          <li class="mb-2">
            <a href="#" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
              <i class="bi bi-chevron-right me-2"></i> NUESTROS SERVICIOS
            </a>
          </li>
          <li class="mb-2">
            <a href="#" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
              <i class="bi bi-chevron-right me-2"></i> BENEFICIOS PARA TI
            </a>
          </li>
          <li>
            <a href="#" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
              <i class="bi bi-chevron-right me-2"></i> BENEFICIOS PARA TU CLIENTE
            </a>
          </li>
        </ul>
      </div>

      <!-- Dirección -->
      <div class="col-12 col-md-3 mb-3 mb-md-0">
        <p class="mb-1">
          <i class="bi bi-geo-alt-fill me-2"></i>
          <strong>Oficinas:</strong> Av. de las Américas No 100 y calle 7ma.<br>
          Edificio "El Ferretero".
        </p>
        <p class="mb-1">
          <strong>Imprenta:</strong> Vía a Daule Km 12 "Comercial Plaza Saiba".<br>
          Guayaquil, Ecuador
        </p>
      </div>

      <!-- Contacto -->
      <div class="col-12 col-md-3">
        <p class="mb-1">
          <i class="bi bi-envelope-fill me-2"></i> ventas@imprimium.ec
        </p>
        <p class="mb-1">
          <i class="bi bi-envelope-fill me-2"></i> info@imprimium.ec
        </p>
        <p class="mb-0">
          <i class="bi bi-whatsapp me-2"></i> (+593) 98 877 2322
        </p>
      </div>
    </div>

    <!-- Línea final -->
    <div class="row mt-4">
      <div class="col text-center text-muted small">
        Imprimium | Copyright © 2024
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
</body>
</html>
