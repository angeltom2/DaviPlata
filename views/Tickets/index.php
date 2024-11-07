<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tickets</title>

    <!-- Estilos CSS de Bootstrap, DataTables y FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />


<style>
        /* Estilos generales */
        body {
            font-family: 'Varela Round', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #ffffff;
            padding: 20px;
            border-right: 1px solid #ddd;
            height: 100vh;
        }

        .profile-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-info img {
            width: 80px;
            border-radius: 50%;
        }

        .menu-item {
            font-size: 1em;
            padding: 10px;
            color: #555;
            display: block;
            text-decoration: none;
            transition: 0.3s;
        }

        .menu-item:hover,
        .menu-item.active {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .content {
            padding: 20px;
            width: 100%;
        }

        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .message-box {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .message-box textarea {
            width: 100%;
            height: 100px;
            resize: none;
        }

        .btn-clean {
            background-color: #dc3545;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-clean:hover {
            background-color: #c82333;
        }
</style>

</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar col-md-3">
            <div class="profile-info">
                <img src="assets/img/person2.png" alt="Profile Picture">
            </div>
            <a href="http://localhost/daviplata/VistaClientes" class="menu-item">Regresar</a>
            <a href="#" class="menu-item">Mis Tickets <span class="badge bg-primary"></span></a>
        </div>

        <!-- Contenido Principal -->
        <div class="content col-md-9">
            <h2 class="mb-4">Mis Tickets</h2>

            <!-- Tabla de Tickets -->
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha Subida</th>
                            <th>Queja</th>
                            <th>Prioridad</th>
                            <th>Status</th>
                            <th>Solución</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <!-- Crear Ticket -->
            <div class="message-box mt-4">
                <h5>Crear Tickets</h5>
                <textarea id="ticketMessage" placeholder="Escribe tu mensaje aquí..."></textarea>

                <input type="text" id="dni" placeholder="Ingresa tu DNI" class="mt-2">

                <div class="mt-2">
                    <!-- Botones para enviar o limpiar el ticket -->
                    <button class="btn btn-primary" onclick="registrarTicket()">Enviar Ticket</button>
                    <button class="btn btn-clean" onclick="clearMessage()"><i class="fas fa-trash-alt"></i> Limpiar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2024 Ticket Management System - All Rights Reserved
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    const base_url = "http://localhost/daviplata/";

        function clearMessage() {
            document.getElementById("ticketMessage").value = "";
        }

        function registrarTicket() {
            let queja = document.getElementById("ticketMessage").value;
            let dni = document.getElementById("dni").value;

            // Validaciones
            if (queja.trim() === "") {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'La queja no puede estar vacía',
                    showConfirmButton: false,
                    timer: 3000,
                    customClass: {
                        popup: 'swal2-center'
                    }
                });
                return;
            }

            if (dni.trim() === "") {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'El DNI es obligatorio',
                    showConfirmButton: false,
                    timer: 3000,
                    customClass: {
                        popup: 'swal2-center'
                    }
                });
                return;
            }

            if (dni.length !== 10) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'El DNI debe tener exactamente 10 dígitos',
                    showConfirmButton: false,
                    timer: 3000,
                    customClass: {
                        popup: 'swal2-center'
                    }
                });
                return;
            }

            // Enviar ticket
            const url = base_url + "Tickets/registrarTicket";
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.setRequestHeader("Content-Type", "application/json");

            http.onreadystatechange = function () {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        try {
                            const res = JSON.parse(this.responseText);

                            if (res.success) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Ticket registrado con éxito',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    customClass: {
                                        popup: 'swal2-center'
                                    }
                                });
                                document.getElementById("ticketMessage").value = "";
                                document.getElementById("dni").value = "";
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: res.message || 'Hubo un error al registrar el ticket',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    customClass: {
                                        popup: 'swal2-center'
                                    }
                                });
                            }
                        } catch (error) {
                            console.error("Error al procesar la respuesta JSON:", error);
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Error en la respuesta del servidor',
                                showConfirmButton: false,
                                timer: 3000,
                                customClass: {
                                    popup: 'swal2-center'
                                }
                            });
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error en la solicitud. Estado: ' + this.status,
                            showConfirmButton: false,
                            timer: 3000,
                            customClass: {
                                popup: 'swal2-center'
                            }
                        });
                    }
                }
            };
            http.send(JSON.stringify({ queja, dni }));
        }
    </script>

</body>

</html>


