<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>INICIAR SESION</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url; ?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>assets/css/styles.css" rel="stylesheet" />

    <style>
        /* Fondo degradado más suave */
        body {
            background: linear-gradient(135deg, #e63946, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .footer-text {
            color: white; /* Cambia el color de texto a blanco */
        }

        /* Tarjeta estilizada con bordes redondeados */
        .card {
            border: none;
            border-radius: 20px; /* Bordes más redondeados */
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2), -10px -10px 20px rgba(255, 255, 255, 0.7);
            transition: transform 0.4s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        /* Encabezado de la tarjeta con fondo rojo y texto blanco */
        .card-header {
            background-color: #e63946; /* Color de fondo del encabezado más suave */
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 1.5rem;
            padding: 1.5rem;
            border-top-left-radius: 20px; /* Bordes redondeados en el encabezado */
            border-top-right-radius: 20px; /* Bordes redondeados en el encabezado */
        }

        /* Imagen al lado del título */
        .header-image {
            width: 120px; /* Aumenta el ancho de la imagen */
            height: auto; /* Altura automática para mantener la proporción */
            vertical-align: middle; /* Alinear verticalmente con el texto */
            margin-right: 10px; /* Espacio entre la imagen y el texto */
        }

        /* Estilo de los campos de entrada */
        .form-control, .form-select {
            border-radius: 10px;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        /* Enfoque en campos de entrada */
        .form-control:focus, .form-select:focus {
            outline: none;
            box-shadow: 0 0 15px #e63946;
        }

        /* Botón de login con estilo de transición suave */
        .btn-primary {
            background-color: #e63946;
            border-color: #e63946;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
            color: white;
            display: block; /* Para centrar el botón */
            margin: 0 auto; /* Margen automático para centrar */
        }

        .btn-primary:hover {
            background-color: #cc0000;
            color: #fff;
            transform: scale(1.05); /* Aumenta ligeramente el tamaño al pasar el ratón */
        }

        /* Alertas con bordes redondeados */
        .alert-danger {
            border-radius: 10px;
        }

        /* Estilo del footer con fondo rojo y texto blanco */
        footer {
            background-color: #e63946;
            color: white;
            text-align: center;
            padding: 1rem;
        }

        /* Agregar animaciones */
        .fadeIn {
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Añadiendo un efecto de sacudida en los elementos al cargar */
        .shake {
            animation: shake 0.5s ease;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            20% {
                transform: translateX(-5px);
            }
            40% {
                transform: translateX(5px);
            }
            60% {
                transform: translateX(-5px);
            }
            80% {
                transform: translateX(5px);
            }
        }
    </style>
</head>
<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main class="fadeIn">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 shake">
                                <div class="card-header">
                                    <img src="assets/img/LogoDaviplata.png" alt="Logo" class="header-image"> <!-- Cambia la ruta a tu imagen -->
                                    <h3 class="text-center my-4">INICIAR SESION</h3>
                                </div>
                                <div class="card-body">
                                    <form id="frmLogin">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                                                <option value="">Selecciona tipo de usuario</option>
                                                <option value="admin">Administrador</option>
                                                <option value="cliente">Cliente</option>
                                            </select>
                                            <label for="tipo_usuario">Tipo de usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="usuario_dni" name="usuario_dni" type="text" placeholder="Ingrese Usuario/DNI" required />
                                            <label for="usuario_dni"><i class="fas fa-user"></i> Usuario/DNI</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="clave" name="clave" type="password" placeholder="Ingrese Contraseña" required />
                                            <label for="clave"><i class="fas fa-key"></i> Contraseña</label>
                                        </div>

                                        <div class="alert alert-danger text-center d-none" id="alerta" role="alert"></div>

                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" onclick="frmlogin(event);">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="footer-text">Copyright &copy; Bienvenido a servicios Financieros</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url; ?>assets/js/main.js"></script>
    <script src="<?php echo base_url; ?>assets/js/ModificaionesLogin.js"></script>

    <script>
        const base_url = "<?php echo base_url; ?>";

        $(document).ready(function() {
            // Agregar animación de fade-in a todos los elementos dentro de la tarjeta al cargar
            $('.card').hide().fadeIn(1000);
        });
    </script>

    <script type="module">
        const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

        import { frmlogin } from '<?php echo base_url; ?>assets/js/funciones.js';    
        window.frmlogin = frmlogin; // Haz que la función sea global
    </script>

    <script src="<?php echo base_url; ?>assets/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>

