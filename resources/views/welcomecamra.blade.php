<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camara de Industrias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Navbar más ancho y con línea blanca debajo */
        .navbar {
            transition: background-color 0.3s;
            padding: 15px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        .navbar.transparent {
            background-color: transparent;
        }
        .navbar.solid {
            background-color: #004d40;
        }

        /* Submenu en "Servicios" */
        .dropdown-menu {
            background: #004d40;
            border: none;
        }
        .dropdown-item {
            color: white;
        }
        .dropdown-item:hover {
            background: #6A5ACD;
        }

         .nav-item:hover {
            background: #6A5ACD;
        }

        /* Ajuste de tamaño fijo en el carrusel */
        .carousel {
            max-height: 500px;
            overflow: hidden;
        }
        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        /* Flechas más pequeñas y bien posicionadas */
        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 50%; /* Centra las flechas verticalmente */
            transform: translateY(-50%);
            z-index: 1000; /* Garantiza que se vean */
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            width: 20px;
            height: 20px;
        }

        /* Superposición completa sobre el carrusel */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 77, 64, 0.7);
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 100px;
        }
        .overlay .content {
            color: white;
            max-width: 500px;
        }
        .overlay h2 {
            font-size: 42px;
            font-weight: bold;
        }
        .overlay p {
            font-size: 18px;
        }
        .overlay .btn-purple {
            background-color: purple;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .expanded-section {
    overflow-x: hidden; /* Evita que el contenido se desborde horizontalmente */
    width: 100vw; /* Asegura que ocupe toda la pantalla sin provocar scroll */
    max-width: 100%; /* Evita crecimiento inesperado */
}

.boton_redondo{position: absolute;
  left: 50%;
  transform: translateX(-50%);
  width: 40px;
  height: 30px;
  border-radius: 50%;
  background-color: #00c59e;
  color: white;
  border: none;
  font-size: 24px;
  cursor: pointer;
  box-shadow: 0 4px 8px rgba(0,0,0,0.3);
  top: -10%;
}



.card-container {
            display: flex;
            gap: 100px;
            margin-top: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        
        .card {
            flex: 1;
            min-width: 300px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background-color: #8a2be2; /* Violeta */
            color: white;
            padding: 15px;
            text-align: center;
        }
        
        .card-header h3 {
            margin: 0;
        }
        
        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .card-body {
            padding: 20px;
            background-color: white;
        }
        
        .card-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #8a2be2; /* Violeta */
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 15px;
        }
        
        .card-button:hover {
            background-color: #7b1fa2;
        }

        .motivation-container {
        padding: 20px;
        margin: 25px 0;
    }

    .motivation-item {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
        position: relative;
    }

    .motivation-item:last-child {
        margin-bottom: 0;
    }

    .image-container {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: stretch;
    }

    .image-container img {
        width: 250px;
        height: 100%;
        object-fit: cover;
        
     
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }


    .text-container {
        flex-grow: 1;
        padding: 20px;
        padding-left: 50px;
        margin-left: -30px;
    }

    .green-bg {
        background-color: #e8f5e9;
        border-radius: 0px;
    }

    .right ~ .text-container {
        padding-left: 20px;
        padding-right: 50px;
        margin-left: 0;
        margin-right: -30px;
    }

    .text-content p {
        margin: 0;
        line-height: 1.6;
        color: #333;
    }

    .first-word {
        font-size: 1.2em;
        font-weight: bold;
        font-style: italic;
        color: #2e7d32;
    }

    /* Alineación automática */
    .left {
        order: 1;
    }
    .right {
        order: 3;
    }
    .text-container {
        order: 2;
    }

    .motivation-item:nth-child(even) .image-container {
        order: 3;
    }
    .motivation-item:nth-child(even) .text-container {
        order: 1;
        padding-left: 20px;
        padding-right: 50px;
        margin-left: 0;
        margin-right: -30px;
    }


      /* Sección El Directorio */
      .director-container {
            background-color: #e8f5e9;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .director-container img {
            width: 250px;
            height: 100%;
            object-fit: cover;
        }
        .separator {
            width: 5px;
            height: 100%;
            background-color: #4a9c76;
            margin: 0 20px;
        }
        .director-info {
            color: #6d6d6d;
            flex: 1;
        }
        .director-info h2 {
            font-size: 2rem;
            font-weight: bold;
            font-style: italic;
            color: #6d6d6d;
        }
        .director-info h2 span {
            font-size: 2.5rem;
            font-weight: bold;
            font-style: italic;
        }
       /* Cards */
      .cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 40px;
    gap: 20px; /* Añadido para mejor espaciado */
}

.card-item {
    display: flex;
    align-items: center;
    width: 100%; /* Por defecto 100% para móviles */
    background-color: white;
    padding: 10px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    flex-shrink: 0; /* Evita que la imagen se reduzca */
}

.card-info-container {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
    align-items: flex-start;
    width: 100%;
}

.card-info {
    background-color: rgb(0, 197, 158);
    padding: 10px;
    text-align: center;
    color: white;
    font-weight: bold;
    width: 100%;
}

.card-description {
    font-size: 14px;
    color: #6d6d6d;
    text-align: center;
    margin-top: 5px;
}
/* Solo este media query para desktop (3 columnas) */
@media (min-width: 768px) {
    .card-item {
        width: calc(33.33% - 20px); /* 3 columnas con espacio */
    }
}
        .cards-container2 {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .card-item2 {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        
    }
    
    .card-item2:hover {
        transform: translateY(-5px);
    }
    
    .card-item2 img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        display: block;
    }
    
    .card-info-container2 {
        padding: 15px;
        background-color: rgb(0, 197, 158);
        flex-grow: 1;
        
    display: flex;
    flex-direction: column;
    }
    
    .card-title-wrapper2 {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 0px;
    }
    
    .card-info2 {
        
        font-size: 16px;
        color: white;
        flex: 1;
        
        overflow: hidden;
        text-overflow: ellipsis;
        word-break: break-word; 
    min-width: 0
    }
    
    .card-button2 {
        background-color: white;
        color: rgb(0, 197, 158);
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        width: 25%;
       
        font-weight: bold;
        flex-shrink: 0; 
       
        transition: all 0.3s ease;
    }
    
    .card-button2:hover {
        background-color: #f0f0f0;
    }
    
    .card-description2 {
        margin: 0;
        color: white;
        font-size: 14px;
    }

    .col-md-4 img {
  width: 100%; /* Mantiene la imagen dentro de su contenedor */
  max-height: 200px; /* Ajusta la altura máxima según sea necesario */
  object-fit: cover; /* Mantiene la proporción sin deformaciones */
}

/* Override responsive para contenido de editor enriquecido */
    .rich-text-content strong {
        line-height: 1.2 !important;
    }
    
    .rich-text-content span {
        font-size: clamp(1.5rem, 5vw, 3rem) !important;
        display: inline-block !important;
    }
    
    @media (max-width: 768px) {
        .rich-text-content br {
            display: none !important;
        }
    }
        

    





/* Estilos existentes (se mantienen igual) */
.director-container {
    background-color: #e8f5e9;
    padding: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.director-container img {
    width: 250px;
    height: 100%;
    object-fit: cover;
}
.separator {
    width: 5px;
    height: 100%;
    background-color: #4a9c76;
    margin: 0 20px;
}
.director-info {
    color: #6d6d6d;
    flex: 1;
}
.director-info h2 {
    font-size: 2rem;
    font-weight: bold;
    font-style: italic;
    color: #6d6d6d;
}
.director-info h2 span {
    font-size: 2.5rem;
    font-weight: bold;
    font-style: italic;
}

/* Nuevos estilos responsive para móvil */
@media (max-width: 767.98px) {
    #directorio.director-container {
        flex-direction: column;
        padding: 20px;
    }
    
    #directorio .director-container img {
        width: 100%;
        max-width: 250px;
        height: auto;
        margin-bottom: 20px;
    }
    
    #directorio .separator {
        width: 100%;
        height: 5px;
        margin: 20px 0;
    }
    
    #directorio .director-info {
        width: 100%;
        text-align: center;
    }
    
    #directorio .director-info h2 {
        font-size: 1.5rem;
    }
    
    #directorio .director-info h2 span {
        font-size: 1.8rem;
    }
}
    
   .modal-fullscreen {
    max-width: 50%;
    width: 90%;
    margin: auto;
    top: 5vh;
    transform: none;
    left: 5%;
}

.modal-content {
    height: 90vh;
    display: flex;
    flex-direction: column;
}

#pdf-viewer-container {
    flex-grow: 1;
    overflow: auto;
}

#pdf-viewer {
    width: 100%;
    min-height: 100%;
}    
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top transparent" id="navbar">
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
                    
                <li class="nav-item">
    <a class="btn btn-success ms-2 d-flex align-items-center" href="https://w.app/1mpthe" target="_blank">
        <i class="fab fa-whatsapp me-2"></i> Afíliate
    </a>
</li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#quienesSomos">Quienes somos</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#directorio">Directorio</a></li>

                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#servi" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Servicios
                        </a>
                        <ul class="dropdown-menu">
                             @foreach($servicios as $serv)
                            <li><a class="dropdown-item" href="{{ route('showmore', ['texto_identificador' => $serv->id,'tabla' => 'SE']) }}">{!!$serv->nombre_titulo!!}</a></li>
                             @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="#carouselExample3">Socios</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carrusel con superposición de contenido -->
    
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($carousel as $index => $carousels)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/'.$carousels->imagen) }}" alt="Carrusel {{ $index + 1 }}">
            <div class="overlay">
                <div class="content">
                    <h2>{{$carousels->nombre_titulo}}</h2>
                    <p>{{$carousels->texto}}</p>
                    <a href="{{ route('showmore', ['texto_identificador' => $carousels->id,'tabla' => 'CA']) }}" class="btn-purple">Más información</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<!-- Sección debajo del carrusel -->
<div class="info-section text-center position-relative" style="overflow: hidden;"> 
    <div style="height: 5px; background-color:rgb(0, 197, 158); width: 100%; position: absolute; top: 0;"></div> <!-- Línea ajustada al tope del carrusel -->

    <!-- Círculo invertido con flecha blanca sobre la línea -->
    <button id="expandButton" class="btn d-flex align-items-center justify-content-center boton_redondo">
        <i class="fas fa-chevron-down" style="font-size: 20px; font-style: initial"></i>
    </button>

    <div class="container mt-5">
        <div class="row text-secondary text-center">
           
            @foreach($seccionmedia as $sec)
            <div class="col-md-4">
                <h3 class="fw-bold text-dark">{{$sec->titulo_seccion }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Sección oculta que se despliega -->
<div id="expandedContent" class="expanded-section py-5 bg-light" style="display: none; transition: all 0.5s ease-in-out;">
    <div class="container">
        <div class="row text-center">
            
            @foreach($seccionmedia as $sec2)
            <div class="col-md-4">
                <p class="fw-bold text-secondary">{{$sec2->texto}}</p>
            </div>
            @endforeach
            </div>
    </div>

    <!-- Imagen con degradado alineada correctamente (fuera del container) -->
<div class="position-relative mt-4" style="width: 100vw;">
    <div class="overlay-gradient" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
         background: linear-gradient(to right, rgba(255, 255, 255, 0.9) 35%, rgba(255, 255, 255, 0));"></div>
@foreach($imagenSeccionMedia as $imagenMedia)
            <img src="{{ asset('storage/'.$imagenMedia->imagen) }}" class="img-fluid" style="width: 100vw; max-height: 300px;" alt="Imagen muestra">

            <!-- Contenedor del texto ajustado -->
            <!-- Contenedor del texto ajustado -->
        <div class="position-absolute top-50 start-0 translate-middle-y p-3 p-md-4 text-overlay">
        <!-- Contenido del editor enriquecido con override de estilos -->
        <div class="rich-text-content" style="color: #009578; font-weight: bold; font-family: 'Poppins', sans-serif;">
     <span style="font-size: 38px;">{!! $imagenMedia->nombre_titulo !!}</span>
    @endforeach
</div>
   </div> 
</div>
<!-- Sección "Quiénes Somos" -->
<section id="quienesSomos" class="py-5">
    <div class="container">
    @foreach($gruposmisionVision as $nombreTitulo => $misionVision)
    <div class="row">
        <div class="col-12">
            <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">{!! $nombreTitulo !!}</h2>
            @foreach($misionVision as $index => $MV)
            <div class="d-flex align-items-start mb-3">
                <img src="{{ asset('storage/'.$MV->imagen) }}" 
                     alt="Ícono {{ $index + 1 }}" 
                     style="width: 65px; height: 65px; margin-right: 15px;">
                <p style="color: #009578; font-size: 16px; margin: 0;">
                    {{$MV->texto}}
                </p>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

        

        <div class="card-container">
            @foreach($conoceMas as $conoce)
            <div class="card">
                <div class="card-header">
                    <h3>{!! $conoce->nombre_titulo !!}</h3>
                </div>
                <img src="{{ asset('storage/'.$conoce->imagen) }}" alt="Cómo nace la cámara" class="card-image">
                <div class="card-body">
                    <p>{{$conoce->texto_corto}}</p>
                    <a href="{{ route('showmore', ['texto_identificador' => $conoce->id,'tabla' => 'CM']) }}" class="card-button">Ver más</a>
                </div>
            </div>
            @endforeach
                   
            
           <!-- <div class="motivation-container">

            @foreach($historiasEmpresa as $historias)
                 Primer elemento 
                <div class="motivation-item">
                    <div class="image-container left">
                        <img src="{{ asset('storage/'.$historias->imagen) }}" alt="Inspiración">
                    </div>
                    <div class="text-container green-bg">
                        <div class="text-content">
                            <p><span class="first-word">{!! $historias->nombre_titulo !!}</span>{{$historias->texto}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
               
            </div>

            -->

        </div>
</br>
    <div class="container">
    <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">DOCUMENTACION DE LA CÁMARA</h2>
    
    <!-- Contenedor de botones -->
    <div class="button-group">
         @foreach($documentos as $documento)
           <a href="#" 
            onclick="handlePdfView('{{ asset('storage/' . $documento->documento) }}', '{{ addslashes($documento->nombre_documento) }}')" 
            class="card-button">
            {{ $documento->nombre_documento }}
            </a>
        @endforeach
    </div>
</div>


<div class="modal fade" id="pdfModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalTitle">Documento PDF</h5>
                <div class="d-flex align-items-center">
                    <!-- Controles de navegación -->
                    <div class="me-3">
                        <button class="btn btn-sm btn-outline-secondary" onclick="prevPage()">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="mx-2">
                            <span id="currentPage">1</span> / <span id="pageCount">1</span>
                        </span>
                        <button class="btn btn-sm btn-outline-secondary" onclick="nextPage()">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    
                    <!-- Botón de descarga -->
                    <a href="#" id="downloadPdf" class="btn btn-sm btn-primary ms-2">
                        <i class="fas fa-download"></i> Descargar
                    </a>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" id="pdf-viewer-container">
                <!-- Opción 1: Visor nativo (iframe) -->
                <iframe id="pdf-native-viewer" style="width:100%; height:100%; border:none; display:none;"></iframe>
                
                <!-- Opción 2: Visor con PDF.js (para navegación personalizada) -->
                <div id="pdf-viewer"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<style>
.button-group {
    display: flex;
    flex-wrap: wrap;
    gap: 15px; /* Espacio entre botones */
    margin-top: 20px;
}

.card-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #8a2be2; /* Violeta */
    color: white;
    text-decoration: none;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    text-align: center;
    flex: 0 0 calc(33.333% - 10px); /* 3 botones por fila */
    box-sizing: border-box;
    transition: background-color 0.3s;
}

.card-button:hover {
    background-color: #7b1fa2;
}

/* Responsive: 2 botones por fila en tablets */
@media (max-width: 768px) {
    .card-button {
        flex: 0 0 calc(50% - 10px);
    }
}

/* Responsive: 1 botón por fila en móviles */
@media (max-width: 480px) {
    .card-button {
        flex: 0 0 100%;
    }
}
</style>
  
            <div class="motivation-container">
              <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">UN EQUIPO QUE ÚNE | CONOCE COMO ESTAMOS FORMADOS</h2>

              <div class="container mt-5">
        <!-- Sección El Directorio -->
         @foreach($directorio as $direc)
          @if($direc->rango_pagina === 'Cabecera')
        <div id="directorio" class="director-container">
            <img src="{{ asset('storage/'.$direc->imagen) }}" alt="Equipo">
            <div class="separator"></div>
            <div class="director-info">
                <h2>{!! $direc->nombre_titulo !!}</h2>
                <p>{{ $direc->texto_descripcion_direc }}</p>
            </div>
        </div>
        @endif
        @endforeach

        <!-- Cards -->
        <div class="cards-container">
            @foreach($directorio as $direc)
          @if($direc->rango_pagina === 'Medio')
            <div class="card-item">
                <img src="{{ asset('storage/'.$direc->imagen) }}" alt="Miembro">
                <div class="card-info-container">
                    <div class="card-info">{{$direc->nombre}}</div>
                    <p class="card-description">{{$direc->cargo.' '.$direc->texto}}</p>
                </div>
            </div>
            @endif
        @endforeach
            
        </div>
<div id="carouselExample2" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @php
            // Filtrar y agrupar los elementos del carrusel
            $carouselItems = $directorio->where('rango_pagina', 'Carousel')->chunk(3);
        @endphp

        @foreach($carouselItems as $index => $chunk)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="row">
                @foreach($chunk as $direc)
                <div class="card-item">
                    <img src="{{ asset('storage/'.$direc->imagen) }}" alt="Miembro">
                    <div class="card-info-container">
                        <div class="card-info">{{$direc->nombre}}</div>
                        <p class="card-description">{{$direc->cargo.' '.$direc->texto}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            
                
            
                

                
            </div>

           <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;" id="servi">SERVICIOS DE LA CÁMARA</h2>
            <div class="cards-container2">
                <!-- Ejemplo con 11 cards (se repetirá el mismo contenido) -->
                 @foreach($servicios as $serv)
                <div class="card-item2">
                    <img src="{{ asset('storage/'.$serv->imagen) }}" alt="Miembro">
                    <div class="card-info-container2">
                        <div class="card-title-wrapper2">
                            <div class="card-info2">{!! $serv->nombre_titulo !!} </div>
                            <a href="{{ route('showmore', ['texto_identificador' => $serv->id,'tabla' => 'SE']) }}" class="card-button2">Ver más</a>
                        </div>
                        
                    </div>
                </div>
                @endforeach
               
            </div>


            <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">NUESTROS SOCIOS PRESENTES | LA PRIMERA RED MULTISECTORIAL DE MANABÍ</h2>
            
<div id="carouselExample3" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($socios->chunk(4) as $index => $chunk)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="row">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach($chunk as $soc)
                    <div class="col">
                        <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                            <div class="row g-0">
                               <div class="col-md-4 d-flex align-items-center">
                                    <img src="{{ asset('storage/'.$soc->imagen) }}" class="img-fluid w-100 h-auto" alt="...">
                                </div>
                                
                                <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title d-flex justify-content-between align-items-center">
    <span>{{$soc->socio}}</span>
     @if($soc->ofertasLaborales->isNotEmpty())
                <a href="{{ route('showmore', ['texto_identificador' => $soc->id, 'tabla' => 'VA']) }}" 
                   class="btn btn-sm btn-success">
                    <i class="fas fa-briefcase"></i> Vacantes 
                </a>
            @endif

            <!-- ({{ $soc->ofertasLaborales->sum('numero_vacantes') }})-->
</h5>
                                        <div class="card-text text-muted">
                                            <i class="fas fa-phone"></i> Teléfono: {{$soc->telefono}}<br>
                                            <i class="fas fa-map-marker-alt"></i> Dirección: {{$soc->ubicacion}}<br>
                                            <i class="fas fa-envelope"></i> Correo: {{$soc->correo}}<br>
                                            <i class="fas fa-globe"></i> Página Web: {{$soc->pagina_web}}
                                           
                                        </div>
         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample3" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample3" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>


    </div>
    
</section>


<!-- Script para desplazamiento suave al hacer clic en el botón -->
<script>
    document.getElementById("quienesSomosBtn").addEventListener("click", function() {
        document.getElementById("quienesSomos").scrollIntoView({ behavior: "smooth" });
    });
</script>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elementos comunes
        const expandButton = document.getElementById("expandButton");
        const expandIcon = document.getElementById("expandIcon");
        const content = document.getElementById("expandedContent");
        
        // Verificar que los elementos existen
        if (!content || !expandButton) {
            console.error("Elementos esenciales no encontrados");
            return;
        }
        
        // Inicialización
        content.style.display = "none";
        window.scrollTo(0, 0);
        
        // Función unificada para expandir/contraer
        function toggleContent(scrollToSection = null) {
            const isShowing = window.getComputedStyle(content).display === "none";
            content.style.display = isShowing ? "block" : "none";
            
            // Animación del ícono (si existe)
            if (expandIcon) {
                expandIcon.style.transform = isShowing ? "rotate(180deg)" : "rotate(0deg)";
            }
            
            // Scroll después de la animación
            if (isShowing) {
                setTimeout(() => {
                    try {
                        if (scrollToSection) {
                            const target = document.querySelector(scrollToSection);
                            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        } else {
                            content.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    } catch (e) {
                        console.error("Error en scroll:", e);
                    }
                }, 150); // Tiempo ajustado
            }
        }
        
        // Evento del botón
        expandButton.addEventListener("click", function() {
            toggleContent();
        });
        
        // Eventos para navbar
        document.querySelectorAll('.nav-link:not(.dropdown-toggle)').forEach(link => {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                
                if (targetId?.startsWith('#') && targetId !== '#') {
                    if (window.getComputedStyle(content).display === "none") {
                        e.preventDefault();
                        toggleContent(targetId);
                    }
                }
            });
        });
    });
</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.remove('transparent');
                navbar.classList.add('solid');
            } else {
                navbar.classList.remove('solid');
                navbar.classList.add('transparent');
            }
        });
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Configuración inicial
    const navbar = document.getElementById('navbar');
    const navbarCollapse = document.getElementById('navbarNav');
    const serviciosDropdown = document.querySelector('.nav-item.dropdown');
    
    // 2. Función mejorada para scroll suave
    const smoothScroll = (target) => {
        if (!target) return;
        
        if (target === '#') {
            // Caso especial para "Inicio"
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            return;
        }
        
        const targetElement = document.querySelector(target);
        if (targetElement) {
            const navbarHeight = navbar ? navbar.offsetHeight : 70;
            const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    };

    // 3. Manejador para enlaces normales
    const handleNavLinkClick = (e) => {
        const href = e.currentTarget.getAttribute('href');
        
        if (href && (href === '#' || href.startsWith('#'))) {
            e.preventDefault();
            
            // Cerrar menú en móviles
            if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                new bootstrap.Collapse(navbarCollapse).hide();
            }
            
            smoothScroll(href);
        }
    };

    // 4. Aplicar a enlaces normales
    document.querySelectorAll('#navbarNav .nav-link:not(.dropdown-toggle)').forEach(link => {
        link.addEventListener('click', handleNavLinkClick);
    });

    // 5. Solución definitiva para el dropdown de Servicios
    if (serviciosDropdown) {
        const dropdownToggle = serviciosDropdown.querySelector('.dropdown-toggle');
        const dropdownMenu = serviciosDropdown.querySelector('.dropdown-menu');
        
        // Dejar que Bootstrap maneje el dropdown normalmente
        dropdownToggle.addEventListener('click', function(e) {
            // Solo ejecutar nuestra lógica para el enlace principal
            if (this.getAttribute('href') === '#servi') {
                // Esperar a que Bootstrap abra el dropdown
                setTimeout(() => {
                    if (dropdownMenu.classList.contains('show')) {
                        smoothScroll('#cards-container2');
                    }
                }, 50);
            }
        });
        
        // Click en items del dropdown
        serviciosDropdown.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                // Cerrar menú en móviles
                if (navbarCollapse.classList.contains('show')) {
                    new bootstrap.Collapse(navbarCollapse).hide();
                }
                
                // Manejar scroll si es enlace interno
                const href = this.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    smoothScroll(href);
                }
            });
        });
    }
});
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
  function handlePdfView(pdfUrl, docName) {
    // Detección mejorada de dispositivos móviles
    const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent) || window.innerWidth < 768;
    
    if (isMobile) {
        // Descarga directa para móviles
        downloadPdf(pdfUrl, docName);
    } else {
        // Visualización nativa en desktop
        showNativePdfModal(pdfUrl, docName);
    }
}

// Función para descargar PDF
function downloadPdf(pdfUrl, docName) {
    const link = document.createElement('a');
    link.href = pdfUrl;
    link.download = docName.replace(/[^a-z0-9]/gi, '_') + '.pdf';
    link.style.display = 'none';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Función para mostrar modal con visor nativo
function showNativePdfModal(pdfUrl, docName) {
    const modal = new bootstrap.Modal(document.getElementById('pdfModal'));
    const pdfTitle = document.getElementById('pdfModalTitle');
    const downloadBtn = document.getElementById('downloadPdf');
    const pdfViewer = document.getElementById('pdf-native-viewer');
    
    // Configurar título y botón de descarga
    pdfTitle.textContent = docName;
    downloadBtn.href = pdfUrl;
    downloadBtn.download = docName + '.pdf';
    
    // Configurar visor nativo
    pdfViewer.src = pdfUrl + '#toolbar=1&navpanes=1'; // Mostrar controles nativos
    pdfViewer.style.display = 'block';
    
    modal.show();
}
</script>
</body>
<!-- Footer -->
<footer class="text-center text-lg-start bg-secondary text-white">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Conéctate con nosotros en las redes sociales:</span>
    </div>
    <!-- Left -->
 
    <!-- Right -->
    <div>
      @foreach($empresa as $empresas)
    @foreach($empresas->redes_sociales as $emp)
       
          <a href="{{ $emp['url'] }}" class="me-4 text-reset">
            <i class="fab fa-{{ $emp['icono'] }}"></i>
          </a>
       
    @endforeach
@endforeach
    </div>
 
    
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->

           @foreach($empresa as $emp)
          <h6 class="text-uppercase fw-bold mb-4">
         
            <i class="fas fa-gem me-3"></i>{{$emp->nombre}}
          </h6>
          <p>
            {{$emp->eslogan_empresa}}
          </p>
        </div>
        <!-- Grid column -->

        

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
          <p><i class="fas fa-home me-3"></i> {{$emp->direccion}}</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            {{$emp->correo}}
          </p>
          <p><i class="fas fa-phone me-3"></i> {{$emp->telefono_movil}}</p>
          <p><i class="fas fa-print me-3"></i> {{$emp->telefono_fijo}}</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="{{$emp->direccion_pagina}}">{{$emp->direccion_pagina}}</a>
  </div>
  @endforeach
  <!-- Copyright -->
</footer>
<!-- Footer -->
</html>