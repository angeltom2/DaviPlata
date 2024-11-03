<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Daviplata - Servicio al Cliente</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
<style>
    /* Estilos personalizados para el tema de Daviplata */
    body {
        background-color: #fff;
        color: #000;
    }

    .navbar {
        background-color: #4e000b;
    }

    .navbar-brand, .nav-link {
        color: #fff !important;
    }

    .navbar .dropdown-menu {
        background-color: #4e000b;
        border: none;
    }

    .navbar .dropdown-item {
        background-color: #fff !important;
        color: #000 !important;
        font-weight: bold;
    }

    .navbar .dropdown-item:hover {
        background-color: #f2f2f2 !important;
    }

    .btn-primary {
        background-color: #4e000b;
        border: none;
    }

    .btn-primary:hover {
        background-color: #6c000f;
    }

    .masthead {
        background-color: #fff;
        position: relative;
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: space-between; /* Espacio entre elementos */
        text-align: center;
    }

    .masthead h1 {
        font-size: 3rem;
        color: #4e000b;
        animation: fadeInDown 1.5s;
    }

    .masthead h2 {
        color: #555;
        animation: fadeInUp 1.5s;
    }

    /* Contenedor para el diálogo y la imagen de la izquierda */
    .left-container {
        display: flex;
        align-items: flex-start; /* Alinear a la parte superior */
    }

    /* Espacio para imágenes en el masthead */
    .image-space {
        display: flex;
        justify-content: flex-start; /* Alinear a la izquierda */
        align-items: flex-start; /* Alinea las imágenes a la parte superior */
        width: 100%; /* Asegura que ocupe todo el ancho */
        margin-top: 20px;
    }

    .image-space img {
        width: 15%; /* Ajustar el ancho de la imagen */
    }

    .dialogue-box {
        width: 35%; /* Ancho ajustado para que no sea tan ancho */
        background-color: #e8e8e8;
        border-radius: 15px; /* Esquinas más redondeadas */
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Sombra más profunda */
        position: relative; /* Posición relativa para la flecha */
        margin-left: 20px; /* Añadir margen a la izquierda */
    }

    .dialogue-box::after {
        content: "";
        position: absolute;
        left: -20px; /* Posiciona la flecha */
        top: 20px; /* Ajusta según sea necesario */
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-right: 15px solid #e8e8e8; /* Mismo color que el cuadro */
        border-bottom: 10px solid transparent;
    }

    /* Imagen de la derecha */
    .right-image {
        display: flex;
        justify-content: flex-end; /* Alinear a la derecha */
        align-items: flex-start; /* Alinea las imágenes a la parte superior */
    }

    .right-image img {
        width: 15%; /* Ajustar el ancho de la imagen */
    }

    .project-text h4 {
        color: #000;
    }

    .project-text p {
        color: #555;
    }

    /* Animaciones */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Secciones personalizadas */
    .services-section, .benefits-section {
        background-color: #f8f9fa;
        padding: 5rem 0;
    }

    .benefits-section {
        background-color: #e0e0e0; /* Gris más oscuro */
    }

    .services-section h2, .benefits-section h2 {
        color: #4e000b;
        font-size: 2.5rem;
        animation: fadeInUp 1.2s;
    }

    .services-section p, .benefits-section p {
        color: #555;
        animation: fadeInUp 1.5s;
    }

    .service-item, .benefit-item {
        background-color: #fff;
        color: #4e000b;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }

    .service-item:hover, .benefit-item:hover {
        transform: translateY(-10px);
    }

    .service-icon, .benefit-icon {
        font-size: 3rem;
        color: #4e000b;
        margin-bottom: 1rem;
    }

    .footer-section {
        background-color: #4e000b;
        padding: 3rem 0;
        text-align: center;
    }

    .social-icon {
        font-size: 2rem;
        margin: 0 1rem;
        color: #fff;
    }

    .btn-volver {
        background-color: #4e000b;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 1.2rem;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-volver:hover {
        background-color: #6c000f;
        transform: scale(1.05);
    }
</style>




</head>
<body id="page-top">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="">Daviplata Servicio al Cliente</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Reseña</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#benefits">Beneficios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tickets">Tickets</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="">Cambiar Contraseña</a></li>
                            <li><a class="dropdown-item" href="http://localhost/daviplata/">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
    <div class="container">
        <h1 class="mx-auto my-0 text-uppercase">Daviplata</h1>
        <h2 class="mx-auto mt-2 mb-5">Atención al Cliente Personalizada y Eficaz</h2>
        <div class="image-space d-flex align-items-start justify-content-between"> <!-- Utiliza flexbox -->
            <div class="d-flex align-items-start"> <!-- Contenedor para la imagen izquierda y el diálogo -->
                <img src="assets/img/asesor.png" alt="Imagen Izquierda" class="img-fluid img-left"> <!-- Imagen Izquierda -->
                <div class="dialogue-box">
                    <h4>Estamos aquí para ayudarte!</h4>
                    <p>Si tienes alguna consulta, por favor háznoslo saber.</p>
                </div>
            </div>
            <img src="assets/img/celular daviplata.png" alt="Imagen Derecha" class="img-fluid img-right"> <!-- Imagen Derecha -->
        </div>
    </div>
</header>





    <!-- Services Section -->
    <section id="services" class="services-section"> 
    <div class="container px-4 px-lg-5">
        <h2 class="text-center">Servicios que Ofrecemos</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item">
                    <i class="service-icon fas fa-phone"></i>
                    <h4>Asesoría Telefónica</h4>
                    <p>Recibe asistencia inmediata a través de nuestra línea de atención al cliente.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item">
                    <i class="service-icon fas fa-comments"></i>
                    <h4>Chat en Vivo</h4>
                    <p>Interactúa con nuestros agentes en tiempo real para resolver tus inquietudes.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item">
                    <i class="service-icon fas fa-ticket"></i>
                    <h4>Sistema de Ticket</h4>
                    <p>Sus solicitudes serán procesadas por un asesor para resolver cualquier inquietud.</p>
                </div>
            </div>
            <!-- Nueva sección para reseñas -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item">
                    <i class="service-icon fas fa-star"></i>
                    <h4>Sistema de encuestas</h4>
                    <p>¡Déjanos tu opinión y ayúdanos a mejorar! Tu feedback es importante para nosotros.</p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Benefits Section -->
    <section id="benefits" class="benefits-section">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center">Beneficios de Usar Daviplata</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-bolt"></i>
                    <h4>Acceso Rápido</h4>
                    <p>Obtén respuestas al instante desde donde estés.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-user-shield"></i>
                    <h4>Soporte Personalizado</h4>
                    <p>Recibe atención adaptada a tus necesidades específicas.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-clock"></i>
                    <h4>Respuestas Rápidas</h4>
                    <p>Resoluciones efectivas para tus preguntas en tiempo real.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-thumbs-up"></i>
                    <h4>Facilidad de Uso</h4>
                    <p>Interfaz intuitiva para facilitar tu experiencia y que tengas un mejor ambiente.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-clock"></i>
                    <h4>Disponibilidad 24/7</h4>
                    <p>Estamos siempre disponibles para ayudarte, sin importar la hora.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-comments"></i>
                    <h4>Canales Diversos</h4>
                    <p>Comunicación a través de múltiples canales para tu comodidad.</p>
                </div>
            </div>
        </div>
    </div>
</section>









