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
       
       
 
    /* Contacto */
    .contact-section {
      padding: 60px 20px;
    }
    .info, .formulario {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .info h3 {
      color: #008f6a;
      margin-bottom: 15px;
    }
    .info p, .info .item {
      font-size: 14px;
      color: #555;
    }
    .info .item strong {
      color: #008f6a;
    }

    /* Formulario */
    .formulario h3 {
      color: #008f6a;
      margin-bottom: 10px;
    }
    .formulario p {
      font-size: 14px;
      margin-bottom: 20px;
      color: #666;
    }
    .formulario input,
    .formulario select,
    .formulario textarea {
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 14px;
      padding: 12px;
    }
    .formulario input:focus,
    .formulario select:focus,
    .formulario textarea:focus {
      border-color: #008f6a;
      box-shadow: 0 0 4px rgba(0,143,106,0.4);
    }
    .formulario button {
      background: #008f6a;
      border: none;
      border-radius: 8px;
      padding: 12px;
      font-size: 16px;
      font-weight: 500;
      color: white;
      transition: 0.3s;
    }
    .formulario button:hover {
      background: #006f53;
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

<!-- Contacto -->
<div class="container contact-section">
  <div class="row g-4">
    <!-- Info -->
    <div class="col-lg-5">
      <div class="info">
        <h3>Contacto</h3>
        <p>Para asesoría o una cotización personalizada puedes escribirnos o llamarnos.</p>
        <div class="item mb-3">
          <strong>Dirección:</strong><br>
          Vía a Daule Km. 12 "Comercial Plaza Saibaiba" <br>
          Av. de las Américas No 100 y calle 7ma.
        </div>
        <div class="item mb-3">
          <strong>Whatsapp:</strong><br>
          (+593) 98 877 2322
        </div>
        <div class="item mb-3">
          <strong>Teléfonos:</strong><br>
          Imprenta: (+593) 99 442 4889 <br>
          Oficina: (04) 228 6882 – Ext 149
        </div>
        <div class="item">
          <strong>Correo electrónico:</strong><br>
          ventas@imprimium.ec <br>
          info@imprimium.ec
        </div>
      </div>
    </div>

    <!-- Formulario -->
    <div class="col-lg-7">
      <div class="formulario">
        <h3>¿Necesitas una asesoría o cotización?</h3>
        <p>Déjanos tus datos y pronto nos pondremos en contacto contigo.</p>
        <form>
          <div class="row g-3">
            <div class="col-md-6"><input type="text" class="form-control" placeholder="Nombre *" required></div>
            <div class="col-md-6"><input type="text" class="form-control" placeholder="Apellido *" required></div>
            <div class="col-md-6"><input type="email" class="form-control" placeholder="Correo electrónico *" required></div>
            <div class="col-md-6"><input type="tel" class="form-control" placeholder="Celular *" required></div>
            <div class="col-12">
              <select class="form-select" required>
                <option value="">¿En qué servicio estás interesado?</option>
                <option>Impresión Offset y Digital</option>
                <option>Packaging</option>
                <option>Otros</option>
              </select>
            </div>
            <div class="col-12">
              <textarea class="form-control" placeholder="Detállanos tu requerimiento *" required></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="w-100">ENVIAR</button>
            </div>
          </div>
        </form>
        <p class="mt-3 small">Revisa nuestro catálogo <a href="#">aquí</a>.</p>
      </div>
    </div>
  </div>
</div>



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
