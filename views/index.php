<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>INICIAR SESION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="<?php echo base_url; ?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>assets/css/styles.css" rel="stylesheet" />
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">INICIAR SESION</h3>
                                </div>
                                <div class="card-body">
                                    <form id="frmLogin">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
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

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Recordar Contraseña</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Olvido Contraseña?</a>
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
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Bienvenido a servicios Financieros</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url; ?>assets/js/scripts.js"></script>

    <script>
        const base_url = "<?php echo base_url; ?>";
    </script>

    <script type="module">
        const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

        import { frmlogin } from '<?php echo base_url; ?>assets/js/funciones.js';    
         window.frmlogin = frmlogin; // Haz que la función sea global
    </script>

    <script src="<?php echo base_url; ?>assets/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
