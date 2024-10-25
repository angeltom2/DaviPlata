<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel de Administrator</title>
    <!-- Carga de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="<?php echo base_url; ?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>assets/css/styles.css" rel="stylesheet" />
<style>
    /* Estilos personalizados */
    body {
        background-color: #f8f9fa; /* Fondo claro */
    }

    .sb-topnav {
        background-color: #343a40; /* Color gris oscuro */
        animation: fadeIn 0.5s; /* Animación para la barra superior */
    }

    .sb-topnav .navbar-brand {
        color: white; /* Blanco para el logo */
        font-weight: bold;
    }

    .sb-topnav .navbar-nav .nav-link {
        color: white; /* Blanco para los enlaces */
        transition: color 0.3s; /* Transición suave para color */
    }

    .sb-topnav .navbar-nav .nav-link:hover {
        color: #b3b3b3; /* Color gris claro al pasar el mouse */
    }

    .sb-sidenav {
        background-color: #800000; /* Color rojo oscuro para la barra lateral */
        color: white; /* Color del texto en la barra lateral */
        animation: fadeIn 0.5s; /* Animación para la barra lateral */
    }

    .sb-sidenav .nav-link {
        color: white; /* Blanco para los enlaces */
        transition: background-color 0.3s, color 0.3s; /* Transiciones suaves */
        font-weight: bold; /* Negrita */
        font-size: 1.1em; /* Tamaño de letra más grueso */
    }

    .sb-sidenav .nav-link:hover {
        background-color: #ffcccc; /* Fondo rojo claro al pasar el mouse */
        color: black; /* Asegurarse de que el texto sea negro */
    }

    .sb-sidenav .nav-link .sb-nav-link-icon {
        color: white; /* Iconos en blanco */
        transition: color 0.3s; /* Transición para iconos */
    }

    .sb-sidenav .nav-link:hover .sb-nav-link-icon {
        color: white; /* Iconos en blanco al pasar el mouse */
    }

    /* Animación para el dropdown */
    .dropdown-menu {
        animation: fadeIn 0.3s ease; /* Animación al abrir */
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Personalizar el footer de la barra lateral */
    .sb-sidenav-footer {
        background-color: #000000; /* Fondo negro sólido */
        color: white; /* Texto blanco */
        padding: 10px; /* Espaciado */
        font-weight: bold; /* Negrita */
    }

    .sb-sidenav .nav-link {
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5), 0 0 5px rgba(255, 255, 255, 0.7); /* Sombra para los textos de navegación */
    }
</style>

</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">DAVIDPLATA</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="cambiarPass">Cambiar Contraseña</a>
                    <div><hr class="dropdown-divider" /></div>
                    <a class="dropdown-item" href="http://localhost/daviplata/">Cerrar Sesion</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-cogs" style="color:white;"></i></div>
                            <span style="font-weight: bold; color:white;">Configuracion</span>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" style="color:white;" href="<?php echo base_url; ?>Usuarios"><i class="fas fa-user me-2" style="color:white;"></i> Usuarios</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?php echo base_url; ?>Clientes">
                            <div class="sb-nav-link-icon"><i class="fas fa-users" style="color:white;"></i></div>
                            <span style="font-weight: bold; color:white;">Clientes</span>
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">BIENVENIDO A</div>
                    <div style="font-weight: bold;">DAVIDPLATA</div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-2">
                       
