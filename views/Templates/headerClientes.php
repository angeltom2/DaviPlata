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
        justify-content: center; /* Centrar contenido */
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

    .image-space {
        display: flex;
        justify-content: center; /* Centra la imagen principal horizontalmente */
        align-items: flex-start; /* Alinea la imagen a la parte superior */
        width: 70%; /* Asegura que ocupe todo el ancho */
        position: relative; /* Para posicionar el logo sobre la imagen */
    }

    .image-space img {
        width: 60%; /* Ajusta el ancho de la imagen a un tamaño más pequeño */
        max-width: 100%; /* Asegura que no exceda el contenedor */
        display: block; /* Cambia a block para asegurar que no haya espacios en blanco */
        margin: 0 auto; /* Aplica margen automático para centrar la imagen */
    }

    .logo-overlay {
        position: relative; /* Cambiar a posición relativa */
        top: 0; /* Ajusta este valor a 0 */
        margin-left: auto; /* Mueve el logo a la derecha */
        width: 0%; /* Ajusta el tamaño del logo, haciéndolo más pequeño */
        transform: translateY(10%); /* Ajusta la posición vertical del logo */
    }

    /* Estilos para la sección de contenido alineada a la izquierda */
    .content-section {
        background-color: #f9f9f9; /* Color de fondo suave */
        border-radius: 10px; /* Bordes redondeados */
        padding: 20px; /* Espaciado interno */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        transition: transform 0.3s ease; /* Transición suave para el hover */
        margin: 20px; /* Margen alrededor del contenedor */
    }

    .content-section:hover {
        transform: scale(1.02); /* Efecto de aumento al pasar el mouse */
    }

    .title {
        font-size: 2rem; /* Tamaño de fuente del título */
        color: #4e000b; /* Color del texto */
        margin-bottom: 20px; /* Espacio inferior */
        text-align: center; /* Centramos el texto */
        animation: fadeInDown 0.5s; /* Animación de entrada */
    }

    .options {
        display: flex; /* Usar flexbox para opciones */
        flex-direction: column; /* Apilar verticalmente */
        gap: 15px; /* Espaciado entre opciones */
    }

    .option {
        display: flex; /* Usar flexbox para icono y texto */
        align-items: center; /* Centrar verticalmente */
        background-color: #fff; /* Fondo blanco para cada opción */
        border-radius: 8px; /* Bordes redondeados */
        padding: 15px; /* Espaciado interno */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra suave */
        transition: background-color 0.3s, transform 0.3s; /* Transición para efectos */
    }

    .option:hover {
        background-color: #eaeaea; /* Fondo claro al pasar el mouse */
        transform: translateY(-2px); /* Levantar la opción al pasar el mouse */
    }

    .option .icon {
        font-size: 1.5rem; /* Tamaño del icono */
        color: #4e000b; /* Color del icono */
        margin-right: 15px; /* Espacio entre icono y texto */
        transition: transform 0.3s; /* Transición para animar el icono */
    }

    .option:hover .icon {
        transform: scale(1.1); /* Aumentar el icono al pasar el mouse */
    }

    .option-text {
        font-size: 1.2rem; /* Tamaño del texto de la opción */
        color: #333; /* Color del texto */
    }

    .info {
        margin-top: 20px; /* Espacio superior para información adicional */
        padding: 15px; /* Padding para separar del borde */
        background-color: #e0f7fa; /* Color de fondo suave */
        border-radius: 10px; /* Bordes redondeados */
        animation: fadeInUp 0.5s; /* Animación de entrada */
    }

    .info p {
        margin: 5px 0; /* Espaciado entre párrafos */
        font-size: 1.1rem; /* Tamaño del texto */
        color: #555; /* Color del texto */
    }

    /* Animaciones */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
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
        background: linear-gradient(135deg, #4e000b, #9c2433); /* Fondo degradado */
        color: white; /* Color del texto */
        padding: 20px 0; /* Espaciado superior e inferior */
        position: relative; /* Para posicionar el pseudo-elemento */
        overflow: hidden; /* Para ocultar desbordamientos */
    }

    .footer-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2); /* Capa oscurecedora */
        z-index: 1; /* Coloca la capa sobre el fondo */
    }

    .container {
        justify-content: center;
        position: relative; /* Asegura que el contenido esté por encima de la capa */
        z-index: 2; /* Asegura que el contenido esté por encima de la capa */
    }

    .btn-volver {
    background-color: #f0f0f0; /* Fondo del botón */
    color: #4e000b; /* Color del texto del botón */
    padding: 10px 20px; /* Espaciado interno */
    border: none; /* Sin borde */
    border-radius: 25px; /* Bordes redondeados */
    font-size: 1rem; /* Tamaño de fuente */
    transition: background-color 0.3s; /* Transición suave */
    display: block; /* O inline-block */
    margin: 0 auto; /* Márgenes automáticos para centrar */
    }

    .btn-volver:hover {
        background-color: #ddd; /* Color de fondo al pasar el mouse */
    }

    .footer-content {
    display: flex; /* Usar flexbox */
    justify-content: space-between; /* Espacio entre elementos */
    align-items: flex-start; /* Alinear verticalmente al inicio */
    padding: 15px 30px; /* Espaciado interno */
    position: relative; /* Añadir esta propiedad si no está ya presente */
    }

    .social-icons {
        display: flex; /* Usar flexbox para iconos */
        gap: 20px; /* Espaciado entre iconos */
        margin-left: auto; /* Empuja los iconos a la derecha */
        align-self: flex-start; /* Alinea los iconos al inicio de la sección */
        margin-top: -10px; /* Ajust /* Alinea los iconos al inicio de la sección */
    }

    .social-icons a {
        color: white; /* Color de los iconos */
        font-size: 3rem; /* Tamaño de los iconos */
        transition: color 0.3s; /* Transición para el color */
    }

    .social-icons a:hover {
        color: #ddd; /* Color al pasar el mouse */
    }

    .app-download {
        display: flex; /* Asegura que los iconos se alineen correctamente */
        justify-content: center; /* Centra los iconos horizontalmente */
        align-items: center; /* Centra los iconos verticalmente */
        padding: 10px; /* Espaciado interno para dar margen */
    }

    .app-download img { /* Si los iconos son imágenes */
        width: 150px; /* Ajusta el tamaño de los iconos */
        height: auto; /* Mantiene la proporción de la imagen */
        margin: 0 10px; /* Espaciado entre iconos */
    }

    .app-download a:hover {
        transform: scale(1.1); /* Aumenta ligeramente el tamaño al pasar el mouse */    
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
                    <li class="nav-item"><a class="nav-link" href="Reseña">Reseña</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#benefits">Beneficios</a></li>
                    <li class="nav-item"><a class="nav-link" href="Tickets">Tickets</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            
                            <button class="dropdown-item" type="button" onclick="abrirModal()">Cambiar Contraseña</button>

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
        <div class="d-flex align-items-start">
            <div class="content-section text-left mr-3">
                <div class="title">Como Recibir Dinero</div>
                <div class="options">
                    <div class="option">
                        <div class="icon"><i class="fas fa-globe-americas"></i></div>
                        <div class="option-text">Recibiendo giros nacionales e internacionales</div>
                    </div>
                    <div class="option">
                        <div class="icon"><i class="fas fa-university"></i></div>
                        <div class="option-text">Desde una cuenta Davivienda</div>
                    </div>
                    <div class="option">
                        <div class="icon"><i class="fas fa-building"></i></div>
                        <div class="option-text">Desde oficinas Davivienda</div>
                    </div>
                    <div class="option">
                        <div class="icon"><i class="fas fa-exchange-alt"></i></div>
                        <div class="option-text">Desde otro banco</div>
                    </div>
                    <div class="option">
                        <div class="icon"><i class="fas fa-briefcase"></i></div>
                        <div class="option-text">A través de abonos de nómina</div>
                    </div>
                    <div class="option">
                        <div class="icon"><i class="fas fa-mobile-alt"></i></div>
                        <div class="option-text">Desde otro DaviPlata</div>
                    </div>
                </div>
                <div class="info">
                    <p>La plata que tiene en su celular,</p>
                    <p>la puede sacar en:</p>
                    <p><strong>Cajeros Automáticos Davivienda.</strong></p>
                </div>
            </div>
            <div class="image-space"> 
                <img src="assets/img/1.png" alt="Imagen" class="img-fluid"> 
            </div>
            <div class="logo-container">
                <img src="assets/img/logoD.png" alt="Logo" class="logo-overlay">
            </div>
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
                    <i class="service-icon fas fa-ticket-alt"></i>
                    <h4>Atención con Tickets</h4>
                    <p>Gestionamos tus consultas a través de un sistema de tickets con un asesor.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item">
                    <i class="service-icon fas fa-comments"></i>
                    <h4>Chat en Vivo</h4>
                    <p>Comunícate con nosotros a través de nuestro chat en vivo disponible 24/7.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-item">
                    <i class="service-icon fas fa-star"></i>
                    <h4>Califica Nuestro Servicio</h4>
                    <p>Deja tu opinión sobre nuestro servicio y ayúdanos a mejorar.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Benefits Section -->
<section id="benefits" class="benefits-section">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center">Beneficios de Nuestros Servicios</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-shield-alt"></i>
                    <h4>Seguridad</h4>
                    <p>Garantizamos la seguridad de tus datos personales y transacciones.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-thumbs-up"></i>
                    <h4>Calidad</h4>
                    <p>Nuestros servicios están diseñados para ofrecer la mejor experiencia al cliente.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-clock"></i>
                    <h4>Disponibilidad</h4>
                    <p>Estamos disponibles para ti en cualquier momento del día.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-comments"></i>
                    <h4>Atención Personalizada</h4>
                    <p>Nuestro equipo te brindará atención personalizada para resolver tus inquietudes.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-sync-alt"></i>
                    <h4>Facilidad de Uso</h4>
                    <p>Nuestra plataforma es intuitiva y fácil de usar, sin complicaciones.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="benefit-item">
                    <i class="benefit-icon fas fa-lightbulb"></i>
                    <h4>Innovación</h4>
                    <p>Incorporamos tecnologías innovadoras para mejorar constantemente nuestros servicios.</p>
                </div>
            </div>
        </div>
    </div>
</section>



