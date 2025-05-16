<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar y Carrusel Mejorado</title>
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
            background: rgba(255, 255, 255, 0.1);
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
        }
        .card-item {
            display: flex;
            align-items: center;
            width: 30%;
            background-color: white;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
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
    }
    
    .card-title-wrapper2 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }
    
    .card-info2 {
        font-weight: bold;
        font-size: 16px;
        color: white;
        flex: 1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
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


        
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top transparent" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_Navbar.png" alt="Logo" width="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Servicios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Consultoría</a></li>
                            <li><a class="dropdown-item" href="#">Desarrollo Web</a></li>
                            <li><a class="dropdown-item" href="#">Marketing Digital</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carrusel con superposición de contenido -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://biologiamarinapor.com/wp-content/uploads/2024/08/importancia-ecologica-y-cultural-de-la-pesca-artesanal.jpg" alt="Carrusel 1">
                <div class="overlay">
                    <div class="content">
                        <h2>Actividades del mes de la Cámara</h2>
                        <p>La primera Red Multisectorial de Manabí, que une a todos los sectores productivos.</p>
                        <a href="#" class="btn-purple">Más información</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Carrusel 2">
                <div class="overlay">
                    <div class="content">
                        <h2>Un espacio para el desarrollo</h2>
                        <p>Conectamos a emprendedores con oportunidades de crecimiento.</p>
                        <a href="#" class="btn-purple">Descubre más</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://programadestinosmexico.com/wp-content/uploads/2023/11/Pesca-en-Veracruz.jpg" alt="Carrusel 3">
                <div class="overlay">
                    <div class="content">
                        <h2>Descubre lo mejor de Manabí</h2>
                        <p>Impulsamos el turismo y la producción local.</p>
                        <a href="#" class="btn-purple">Explorar</a>
                    </div>
                </div>
            </div>
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
            <div class="col-md-4">
                <h3 class="fw-bold text-dark">PROMOVEMOS</h3>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold text-dark">CONECTAMOS</h3>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold text-dark">DEFENDEMOS</h3>
            </div>
        </div>
    </div>
</div>

<!-- Sección oculta que se despliega -->
<div id="expandedContent" class="expanded-section py-5 bg-light" style="display: none; transition: all 0.5s ease-in-out;">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <p class="fw-bold text-secondary">Los Afiliados a la Cámara de Industrias y Producción de Manabí confían y apoyan las iniciativas empresariales.</p>
            </div>
            <div class="col-md-4">
                <p class="fw-bold text-secondary">Brindamos apoyo estratégico para inversión y crecimiento competitivo.</p>
            </div>
            <div class="col-md-4">
                <p class="fw-bold text-secondary">Generamos espacios de conexión para el desarrollo de negocios sostenibles.</p>
            </div>
        </div>
    </div>

    <!-- Imagen con degradado alineada correctamente (fuera del container) -->
    <div class="position-relative mt-4" style="width: 100vw;">
    <div class="overlay-gradient" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
         background: linear-gradient(to right, rgba(255, 255, 255, 0.9) 35%, rgba(255, 255, 255, 0));"></div>

    <img src="https://www.galeodan.com/images/collage_pav_c.jpg" class="img-fluid" style="width: 100vw; max-height: 300px;" alt="Imagen muestra">

    <!-- Contenedor del texto ajustado -->
    <!-- Contenedor del texto ajustado -->
<div class="position-absolute text-overlay" style="top: 50%; left: 5%; transform: translateY(-50%);
     color: #009578; font-weight: bold; font-family: 'Poppins', sans-serif; width: 33%; word-wrap: break-word; line-height: 1.2;">
    <span style="font-size: 38px;">Impulsamos el desarrollo empresarial de Manabí</span>
</div>
    
</div>
<!-- Sección "Quiénes Somos" -->
<section id="quienesSomos" class="py-5">
    <div class="container">
        <!-- Primera parte: Hablemos de Nosotros -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">Hablemos de Nosotros | Quiénes Somos</h2>
                <p style="color: #009578; font-size: 16px;">
                    CIPM es una asociación empresarial que representa y apoya a los sectores industriales y productivos de Manabí.
                    Promueve el crecimiento económico sostenible, conectando empresas, gobierno y comunidad. Agrupa industrias como 
                    manufactura y agroindustria para fomentar la innovación, la competitividad y el empleo, fortaleciendo el desarrollo 
                    industrial de la región.
                </p>
            </div>
        </div>

        <!-- Segunda parte: Que Nos Representa -->
        <div class="row">
            <div class="col-12">
                <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">Qué Nos Representa | Misión y Visión</h2>
                <p style="color: #009578; font-size: 16px;">
                    Promover el crecimiento sostenible de los sectores industriales y productivos de Manabí, representando los intereses 
                    de nuestros afiliados, fomentando la innovación y abogando por políticas que mejoren la competitividad y el desarrollo económico.
                </p>
                <p style="color: #009578; font-size: 16px;">
                    Ser la voz líder de las industrias de Manabí, reconocida por impulsar el progreso económico, la sostenibilidad y la responsabilidad social,
                    posicionando a la provincia como un centro de excelencia industrial en el Ecuador.
                </p>
            </div>
        </div>

        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    <h3>COMO NACE | LA CAMARA</h3>
                </div>
                <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Cómo nace la cámara" class="card-image">
                <div class="card-body">
                    <p>La inspiración y amor por nuestra provincia hace que nos una mismo sentir...</p>
                    <a href="#" class="card-button">Ver más</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>COMO NACE | LA CAMARA</h3>
                </div>
                <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Cómo nace la cámara" class="card-image">
                <div class="card-body">
                    <p>La inspiración y amor por nuestra provincia hace que nos una mismo sentir...</p>
                    <a href="#" class="card-button">Ver más</a>
                </div>
            </div>

            
            
            <div class="card">
                <div class="card-header">
                    <h3>CONOCE NUESTRO | DIRECTORIO</h3>
                </div>
                <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Conoce nuestro directorio" class="card-image">
                <div class="card-body">
                    <p>La sinergia empresarial con un propósito en común elige un directorio...</p>
                    <a href="#" class="card-button">Ver más</a>
                </div>
            </div>

          

            <div class="motivation-container">
                <!-- Primer elemento -->
                <div class="motivation-item">
                    <div class="image-container left">
                        <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Inspiración">
                    </div>
                    <div class="text-container green-bg">
                        <div class="text-content">
                            <p><span class="first-word">Inspirados</span> Ser la voz líder de las industrias de Manabí, reconocida por impulsar el progreso económico, la sostenibilidad y la responsabilidad social, posicionando a la provincia como un centro de excelencia industrial en el Ecuador.</p>
                        </div>
                    </div>
                </div>
            
                <!-- Segundo elemento -->
                <div class="motivation-item">
                    <div class="image-container right">
                        <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Compromiso">
                    </div>
                    <div class="text-container green-bg">
                        <div class="text-content">
                            <p><span class="first-word">Comprometidos</span> Ser la voz líder de las industrias de Manabí, reconocida por impulsar el progreso económico, la sostenibilidad y la responsabilidad social, posicionando a la provincia como un centro de excelencia industrial en el Ecuador.</p>
                        </div>
                    </div>
                </div>
            
                <!-- Tercer elemento -->
                <div class="motivation-item">
                    <div class="image-container left">
                        <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Visión">
                    </div>
                    <div class="text-container green-bg">
                        <div class="text-content">
                            <p><span class="first-word">Visionarios</span> Ser la voz líder de las industrias de Manabí, reconocida por impulsar el progreso económico, la sostenibilidad y la responsabilidad social, posicionando a la provincia como un centro de excelencia industrial en el Ecuador.</p>
                        </div>
                    </div>
                </div>

                <div class="motivation-item">
                    <div class="image-container left">
                        <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Visión">
                    </div>
                    <div class="text-container green-bg">
                        <div class="text-content">
                            <p><span class="first-word">Visionarios</span> Ser la voz líder de las industrias de Manabí, reconocida por impulsar el progreso económico, la sostenibilidad y la responsabilidad social, posicionando a la provincia como un centro de excelencia industrial en el Ecuador.</p>
                        </div>
                    </div>
                </div>
            </div>

            

        </div>

            <div class="motivation-container">
              <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">UN EQUIPO QUE ÚNE | CONOCE COMO ESTAMOS FORMADOS</h2>

              <div class="container mt-5">
        <!-- Sección El Directorio -->
        <div class="director-container">
            <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Equipo">
            <div class="separator"></div>
            <div class="director-info">
                <h2><span>El</span> Directorio</h2>
                <p>El Directorio está compuesto por roles clave como presidente, vicepresidente y director ejecutivo.</p>
            </div>
        </div>

        <!-- Cards -->
        <div class="cards-container">
            <div class="card-item">
                <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
                <div class="card-info-container">
                    <div class="card-info">Luis Villacresses</div>
                    <p class="card-description">Presidente del Directorio 2022-2026</p>
                </div>
            </div>
            <div class="card-item">
                <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
                <div class="card-info-container">
                    <div class="card-info">Victor Moreira</div>
                    <p class="card-description">Director Ejecutivo 2022-2026</p>
                </div>
            </div>
            <div class="card-item">
                <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
                <div class="card-info-container">
                    <div class="card-info">Jesús Reabala</div>
                    <p class="card-description">Primer Vocal 2022-2026</p>
                </div>
            </div>
        </div>

<div id="carouselExample2" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">
 
    <!-- Slide 1 -->
<div class="carousel-item active">
<div class="row">

    <div class="card-item">
        <img src="https://biologiamarinapor.com/wp-content/uploads/2024/08/importancia-ecologica-y-cultural-de-la-pesca-artesanal.jpg" alt="Miembro">
        <div class="card-info-container">
            <div class="card-info">Victor Moreira</div>
            <p class="card-description">Director Ejecutivo 2022-2026</p>
        </div>
    </div>


    <div class="card-item">
        <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
        <div class="card-info-container">
            <div class="card-info">Victor Moreira</div>
            <p class="card-description">Director Ejecutivo 2022-2026</p>
        </div>
    </div>

    <div class="card-item">
        <img src="https://biologiamarinapor.com/wp-content/uploads/2024/08/importancia-ecologica-y-cultural-de-la-pesca-artesanal.jpg" alt="Miembro">
        <div class="card-info-container">
            <div class="card-info">Victor Moreira</div>
            <p class="card-description">Director Ejecutivo 2022-2026</p>
        </div>
    </div>

</div>
</div>
 
    <!-- Slide 2 -->
<div class="carousel-item">
<div class="row">

    <div class="card-item">
        <img src="https://programadestinosmexico.com/wp-content/uploads/2023/11/Pesca-en-Veracruz.jpg" alt="Miembro">
        <div class="card-info-container">
            <div class="card-info">Victor Moreira</div>
            <p class="card-description">Director Ejecutivo 2022-2026</p>
        </div>
    </div>

    <div class="card-item">
        <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
        <div class="card-info-container">
            <div class="card-info">Victor Moreira</div>
            <p class="card-description">Director Ejecutivo 2022-2026</p>
        </div>
    </div>

    <div class="card-item">
        <img src="https://programadestinosmexico.com/wp-content/uploads/2023/11/Pesca-en-Veracruz.jpg" alt="Miembro">
        <div class="card-info-container">
            <div class="card-info">Victor Moreira</div>
            <p class="card-description">Director Ejecutivo 2022-2026</p>
        </div>
    </div>

</div>
</div>
 
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

            <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">UN EQUIPO QUE ÚNE | CONOCE COMO ESTAMOS FORMADOS</h2>
            <div class="cards-container2">
                <!-- Ejemplo con 11 cards (se repetirá el mismo contenido) -->
                <div class="card-item2">
                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
                    <div class="card-info-container2">
                        <div class="card-title-wrapper2">
                            <div class="card-info2">Victor Moreira</div>
                            <button class="card-button2">Ver más</button>
                        </div>
                        
                    </div>
                </div>
                
                <div class="card-item2">
                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
                    <div class="card-info-container2">
                        <div class="card-title-wrapper2">
                            <div class="card-info2">Victor Moreira</div>
                            <button class="card-button2">Ver más</button>
                        </div>
                        
                    </div>
                </div>
                <div class="card-item2">
                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
                    <div class="card-info-container2">
                        <div class="card-title-wrapper2">
                            <div class="card-info2">Victor Moreira</div>
                            <button class="card-button2">Ver más</button>
                        </div>
                        
                    </div>
                </div>
                <div class="card-item2">
                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
                    <div class="card-info-container2">
                        <div class="card-title-wrapper2">
                            <div class="card-info2">Victor Moreira</div>
                            <button class="card-button2">Ver más</button>
                        </div>
                        
                    </div>
                </div>
                <div class="card-item2">
                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg" alt="Miembro">
                    <div class="card-info-container2">
                        <div class="card-title-wrapper2">
                            <div class="card-info2">Victor Moreira</div>
                            <button class="card-button2">Ver más</button>
                        </div>
                        
                    </div>
                </div>
                <!-- Repetir este bloque tantas veces como cards necesites -->
                
                
                <!-- Puedes duplicar este bloque hasta tener 11 cards -->
                <!-- ... otros 9 cards ... -->
            </div>


            <h2 class="fw-bold" style="color: #6A5ACD; font-size: 24px;">UN EQUIPO QUE ÚNE | CONOCE COMO ESTAMOS FORMADOS</h2>
            

            <div id="carouselExample3" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                 
                    <!-- Slide 1 -->
                <div class="carousel-item active">
                <div class="row">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg"  alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title">Información de Contacto</h5>
                                     <div class="card-text text-muted">
  <i class="fas fa-phone"></i> Teléfono: +593 123 456 789<br>
  <i class="fas fa-map-marker-alt"></i> Dirección: Calle Principal #123, Portoviejo, Ecuador<br>
  <i class="fas fa-envelope"></i> Correo: contacto@example.com<br>
  <i class="fas fa-globe"></i> Página Web: www.ejemplo.com
</div>

                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg"  alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title">Información de Contacto</h5>
                                      <div class="card-text text-muted">
  <i class="fas fa-phone"></i> Teléfono: +593 123 456 789<br>
  <i class="fas fa-map-marker-alt"></i> Dirección: Calle Principal #123, Portoviejo, Ecuador<br>
  <i class="fas fa-envelope"></i> Correo: contacto@example.com<br>
  <i class="fas fa-globe"></i> Página Web: www.ejemplo.com
</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg"  alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title">Información de Contacto</h5>
                                      <div class="card-text text-muted">
  <i class="fas fa-phone"></i> Teléfono: +593 123 456 789<br>
  <i class="fas fa-map-marker-alt"></i> Dirección: Calle Principal #123, Portoviejo, Ecuador<br>
  <i class="fas fa-envelope"></i> Correo: contacto@example.com<br>
  <i class="fas fa-globe"></i> Página Web: www.ejemplo.com
</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg"  alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title">Información de Contacto</h5>
                                      <div class="card-text text-muted">
  <i class="fas fa-phone"></i> Teléfono: +593 123 456 789<br>
  <i class="fas fa-map-marker-alt"></i> Dirección: Calle Principal #123, Portoviejo, Ecuador<br>
  <i class="fas fa-envelope"></i> Correo: contacto@example.com<br>
  <i class="fas fa-globe"></i> Página Web: www.ejemplo.com
</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        
                      
                      </div>
                </div>
                </div>
                 
                    <!-- Slide 2 -->
                <div class="carousel-item">
                <div class="row">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg"  alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title">Información de Contacto</h5>
                                      <div class="card-text text-muted">
  <i class="fas fa-phone"></i> Teléfono: +593 123 456 789<br>
  <i class="fas fa-map-marker-alt"></i> Dirección: Calle Principal #123, Portoviejo, Ecuador<br>
  <i class="fas fa-envelope"></i> Correo: contacto@example.com<br>
  <i class="fas fa-globe"></i> Página Web: www.ejemplo.com
</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div><div class="col">
                            <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg"  alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title">Información de Contacto</h5>
                                      <div class="card-text text-muted">
  <i class="fas fa-phone"></i> Teléfono: +593 123 456 789<br>
  <i class="fas fa-map-marker-alt"></i> Dirección: Calle Principal #123, Portoviejo, Ecuador<br>
  <i class="fas fa-envelope"></i> Correo: contacto@example.com<br>
  <i class="fas fa-globe"></i> Página Web: www.ejemplo.com
</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div><div class="col">
                            <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg"  alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title">Información de Contacto</h5>
                                      <div class="card-text text-muted">
  <i class="fas fa-phone"></i> Teléfono: +593 123 456 789<br>
  <i class="fas fa-map-marker-alt"></i> Dirección: Calle Principal #123, Portoviejo, Ecuador<br>
  <i class="fas fa-envelope"></i> Correo: contacto@example.com<br>
  <i class="fas fa-globe"></i> Página Web: www.ejemplo.com
</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div><div class="col">
                            <div class="card mb-3" style="max-width: 540px; border: none; background-color: #e8f5e9;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="https://www.galeodan.com/images/collage_pav_c.jpg"  alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="max-width: 540px; background-color: #e8f5e9;">
                                      <h5 class="card-title">Información de Contacto</h5>
                                      <div class="card-text text-muted">
  <i class="fas fa-phone"></i> Teléfono: +593 123 456 789<br>
  <i class="fas fa-map-marker-alt"></i> Dirección: Calle Principal #123, Portoviejo, Ecuador<br>
  <i class="fas fa-envelope"></i> Correo: contacto@example.com<br>
  <i class="fas fa-globe"></i> Página Web: www.ejemplo.com
</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                </div>
                </div>
                 
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
    document.getElementById("expandButton").addEventListener("click", function() {
        let content = document.getElementById("expandedContent");
        content.style.display = content.style.display === "none" ? "block" : "none";
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

</body>
</html>