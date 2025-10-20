<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            padding-top: 70px;
        }
        
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #004d40;
            border-bottom: 1px solid #004d40;
            padding: 15px 30px;
            transition: background-color 0.3s;
        }
        
        .dropdown-menu {
            background: #004d40;
            border: none;
        }
        
        .dropdown-item, .nav-link {
            color: white;
        }
        
        .dropdown-item:hover, .nav-item:hover {
            background: #6A5ACD;
        }
        
        main {
            margin-top: 20px;
        }
        
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .card-item {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .card-item:hover {
            transform: translateY(-5px);
        }
        
        .card-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        
        .card-info-container {
            padding: 15px;
            background-color: rgb(0, 197, 158);
        }
        
        .card-title-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .card-info {
            font-weight: bold;
            font-size: 16px;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .card-button {
            background-color: white;
            color: rgb(0, 197, 158);
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .card-button:hover {
            background-color: #f0f0f0;
        }
        
        .footer {
            margin-top: 40px;
            background-color: #6c757d;
            color: white;
        }
        
        .menu-card {
            max-width: 350px;
            height: 263px;
            background-color: rgba(232, 245, 233, 0.9);
        }
        .fixed-image {
    width: 100%;
    height: 300px; /* Altura deseada */
    object-fit: cover;
    object-position: center;
}

/* Opcional: contenedor para mantener el layout */
.image-container {
    overflow: hidden;
    border-radius: 8px; /* Opcional: bordes redondeados */
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                @foreach($empresa as $emp)
                <img src="{{ $emp->logo_empresa }}" alt="Logo" width="250">
                @endforeach
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Servicios
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($servicios as $serv)
                            <li><a class="dropdown-item" href="{{ route('showmore', ['texto_identificador' => $serv->id,'tabla' => 'SE']) }}">{!!$serv->nombre_titulo!!}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

 
    @if ($contenido->first()->variable == "VA")
    <main class="container">
        <div class="container bg-light">
            <div class="row">
                <!-- Menú Interno -->
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="card mb-3 menu-card">
                        <div class="card-body">
                            <h5 class="card-title">{{$contenido->first()->nombre_socio}}</h5>
                            <div class="card-text text-muted">
                                <i class="fa-solid fa-hand-point-right"></i> Vacantes disponibles
                            </div>
                        </div>
                    </div>
                </div>
  <!-- Imagen Principal -->
                <div class="col-lg-8">
                    
                    <img src="{{ asset('storage/'.$contenido->first()->imagen) }}" class="img-fluid fixed-image" alt="Descripción">
                </div>
                 <!-- Contenido Texto -->
                <div class="col-12 pt-1 pb-3 px-0">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-4">
                            <div class="contenido">
                                <div class="accordion" id="ofertasAccordion">
                                     @foreach($contenido as $item)
                                    <div class="card mb-3">
                                        <div class="card-header" id="heading{{ $item->id }}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center collapsed" 
                                                        type="button" 
                                                        data-bs-toggle="collapse" 
                                                        data-bs-target="#collapse{{ $item->id }}" 
                                                        aria-expanded="false" 
                                                        aria-controls="collapse{{ $item->id }}">
                                                    <span>
                                                        <strong>{{ $item->puesto_oferta }}</strong> - 
                                                        {{ $item->nombre_socio }} ({{ $item->numero_vacantes }} vacantes)
                                                    </span>
                                                    <i class="fas fa-chevron-down"></i>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapse{{ $item->id }}" 
                                             class="collapse" 
                                             aria-labelledby="heading{{ $item->id }}" 
                                             data-bs-parent="#ofertasAccordion">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <h5>Socio:</h5>
                                                        <p>{{ $item->nombre_socio }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5>Puesto ofertado:</h5>
                                                        <p>{{ $item->puesto_oferta }}</p>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <h5>Número de vacantes:</h5>
                                                        <p>{{ $item->numero_vacantes }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5>Tipo de vacante:</h5>
                                                        <p>{{ ucfirst($item->tipo_vacante) }}</p>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <h5>Descripción de la vacante:</h5>
                                                    <div class="border p-3">
                                                        {!! $item->descripcion_vacante !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @else
  @foreach($contenido as $item)
    <main class="container">
        <div class="container bg-light">
            <div class="row">
                <!-- Menú Interno -->
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="card mb-3 menu-card">
                        <div class="card-body">
                            <h5 class="card-title">{!! $item->nombre_titulo !!}</h5>
                            <div class="card-text text-muted">
                                <i class="fa-solid fa-hand-point-right"></i> {{ $item->texto }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Imagen Principal -->
                <div class="col-lg-8">
                    
                    <img src="{{ asset('storage/'.$item->imagen) }}" class="img-fluid fixed-image" alt="Descripción">
                </div>

                <!-- Contenido Texto -->
                <div class="col-12 pt-1 pb-3 px-0">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-4">
                            <div class="contenido">
                                {!! $item->texto_amplio_html !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
     @endforeach
    @endif
   

    <!-- Footer -->
    <footer class="footer">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span>Conéctate con nosotros en las redes sociales:</span>
            </div>
            <div>
                @foreach($empresa as $emp)
                @foreach($emp->redes_sociales as $red)
                <a href="{{ $red['url'] }}" class="me-4 text-reset">
                    <i class="fab fa-{{ $red['icono'] }}"></i>
                </a>
                @endforeach
                @endforeach
            </div>
        </section>

        <section class="">
            <div class="container text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-4 col-lg-3 mb-4">
                        @foreach($empresa as $emp)
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>{{$emp->nombre}}
                        </h6>
                        <p>{{$emp->eslogan_empresa}}</p>
                    </div>

                    <div class="col-md-4 col-lg-3 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                        <p><i class="fas fa-home me-3"></i> {{$emp->direccion}}</p>
                        <p><i class="fas fa-envelope me-3"></i>{{$emp->correo}}</p>
                        <p><i class="fas fa-phone me-3"></i> {{$emp->telefono_movil}}</p>
                        <p><i class="fas fa-print me-3"></i> {{$emp->telefono_fijo}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4 bg-dark bg-opacity-10">
            @foreach($empresa as $emp)
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="{{$emp->direccion_pagina}}">{{$emp->direccion_pagina}}</a>
            @endforeach
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>