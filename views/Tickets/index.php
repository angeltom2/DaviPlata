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
    <table id="tblTickets" class="table table-striped">
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

<div id="editar_ticket" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
    <div class="modal-content" style="border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
      <div class="modal-header" style="background: #800000; border-top-left-radius: 12px; border-top-right-radius: 12px;">
        <h5 class="modal-title font-weight-bold" id="title" style="color: white;">Editar Queja</h5>
      </div>

      <div class="modal-body" style="padding: 30px;">
        <form method="post" id="frmTicket">
          <input type="hidden" id="id_ticket" name="id_ticket">
          <div class="form-group">
            <label for="queja">Queja</label>
            <textarea id="queja" class="form-control" name="queja" rows="5" placeholder="Ingrese la queja" required></textarea>
          </div>

          <div class="form-group d-flex justify-content-between" style="margin-top: 20px;">
            <button class="btn btn-danger" type="button" data-dismiss="modal" id="cancelar-btn">Cancelar</button>
            <button class="btn btn-secondary" type="button" onclick="limpiarFormulario();">Limpiar</button>
            <button class="btn btn-primary" type="button" onclick="modificarTicket(event);" id="btnAccion">Modificar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
    let tblTickets;

    function clearMessage() {
        document.getElementById("ticketMessage").value = "";
    }

    function registrarTicket(callback) {
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
    
    document.addEventListener("DOMContentLoaded", function () {

    $(document).ready(function() {
    tblTickets = $('#tblTickets').DataTable({
        "lengthChange": false,   // Desactiva "Show entries"
        "paging": true,          // Habilita la paginación
        "searching": true,       // Habilita la búsqueda
        "info": true,            // Muestra la información (total de registros)
        "ajax": {
            "url": base_url + "tickets/listar",  // URL para obtener los datos de los tickets
            "dataSrc": function (json) {
                console.log("Datos recibidos del servidor:", json); // Verifica los datos recibidos
                return json; // Retorna los datos sin modificar
            }
        },
        "columns": [
            { 'data': 'id' },                       // ID del ticket
            { 'data': 'fecha_subida' },             // Fecha en que se subió el ticket
            { 'data': 'queja' },                    // Descripción de la queja
            { 'data': 'priority' },                 // Cambié 'prioridad' por 'priority' para que coincida con la columna devuelta
            {
                'data': 'status',                   // Estado del ticket (por ejemplo, "Abierto", "Cerrado" o "En Progreso")
                'render': function (data) {
                    let status, color;
                    if (data.includes("Abierto")) {
                        status = 'Abierto';
                        color = '#ffc107'; // Amarillo para Abierto
                    } else if (data.includes("Cerrado")) {
                        status = 'Cerrado';
                        color = '#28a745'; // Verde para Cerrado
                    } else if (data.includes("En Progreso")) {
                        status = 'En Progreso';
                        color = '#17a2b8'; // Azul para En Progreso
                    }
                    return `<span style="color: white; background-color: ${color}; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">${status}</span>`;
                }
            },
            { 'data': 'solucion' },                 // Solución proporcionada, si la hay
            {
                'data': null,                       // Columna para acciones (editar, eliminar, ver detalles)
                'render': function (data, type, row) {
                    return `
                        <button class="btn btn-warning btn-sm" onclick="editarTicket(${row.id})">Editar</button>
                    `;
                }
            }
        ]
    });
    });


    $('#reloadTable').on('click', function () {
        tblTickets.ajax.reload(null, false); 
    });

    });

    function editarTicket(id) {
    document.getElementById("title").innerHTML = "Editar Queja";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Tickets/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                const res = JSON.parse(this.responseText);
                document.getElementById("id_ticket").value = res.id;
                document.getElementById("queja").value = res.queja;
                $("#editar_ticket").modal("show");
            } catch (error) {
                console.error("Error parsing JSON:", error);
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error en la respuesta del servidor',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    };
    }

    function modificarTicket(event) {
    event.preventDefault();
    const id = document.getElementById("id_ticket").value;
    const queja = document.getElementById("queja").value.trim(); // eliminamos espacios en blanco

    // Validación: que la queja no esté vacía
    if (queja === "") {
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'La queja no puede estar vacía',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }

    // Confirmación de SweetAlert2
    Swal.fire({
        title: "¿Estás seguro de modificar la queja?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, modificar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Tickets/modificar";
            const data = new FormData();
            data.append("id", id);
            data.append("queja", queja);

            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            http.send(data);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = this.responseText.trim();
                    if (res === "modificado") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Ticket modificado correctamente',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $("#editar_ticket").modal("hide");
                        cargarTickets();
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error al modificar el ticket',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                }
            };
        }
    });
    }

    function cargarTickets() {
    const url = base_url + "Tickets/obtenerTickets"; // URL de la función obtenerTickets en el controlador

    fetch(url, {
        method: "GET",
        headers: { "X-Requested-With": "XMLHttpRequest" }
    })
    .then(response => response.json())
    .then(data => {
        const tableBody = document.querySelector("#tblTickets tbody");
        tableBody.innerHTML = ""; // Limpia la tabla antes de llenarla nuevamente

        data.forEach(ticket => {
            // Definimos los estilos del campo status
            let statusHtml;
            if (ticket.status.includes("Abierto")) {
                statusHtml = `<span style="color: white; background-color: #ffc107; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">Abierto</span>`;
            } else if (ticket.status.includes("Cerrado")) {
                statusHtml = `<span style="color: white; background-color: #28a745; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">Cerrado</span>`;
            } else if (ticket.status.includes("En Progreso")) {
                statusHtml = `<span style="color: white; background-color: #17a2b8; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">En Progreso</span>`;
            }

            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${ticket.id}</td>
                <td>${ticket.fecha_subida}</td>
                <td>${ticket.queja}</td>
                <td>${ticket.priority ? ticket.priority : 'Sin prioridad'}</td>
                <td>${statusHtml}</td>
                <td>${ticket.solucion}</td>
                <td><button class="btn btn-warning btn-sm" type="button" onclick="editarTicket(${ticket.id});">Editar</button><td>
            `;
            tableBody.appendChild(row);
        });
    })
    .catch(error => console.error("Error al cargar los tickets:", error));
    }   

    document.addEventListener("DOMContentLoaded", function() {
        cargarTickets();
    });

    function limpiarFormulario() {
        document.getElementById("queja").value = "";
    }

    document.getElementById("cancelar-btn").addEventListener("click", function() {
    
    $('#editar_ticket').modal('hide');

    document.getElementById("frmTicket").reset();
    }); 

</script>


</body>

</html>


