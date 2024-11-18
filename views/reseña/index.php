<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas - Servicios Financieros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        main {
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            border-right: 1px solid #ddd;
        }

        .sidebar h2 {
            text-align: center;
            color: #0d6efd;
            padding: 1rem 0;
            border-bottom: 1px solid #ddd;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            font-size: 1rem;
        }

        .sidebar ul li:hover {
            background-color: #0d6efd;
        }

        .sidebar ul li:hover a {
            color: #fff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            background-color: #ffffff;
            padding: 15px 20px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 1.5rem;
            color: #333;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container textarea,
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #0d6efd;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0b5ed7;
        }

        .stars {
            display: flex;
            gap: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .stars span {
            font-size: 2rem;
            color: #ddd;
        }

        .stars span.active {
            color: #ffc107;
        }

        .rating-description {
            font-size: 1rem;
            font-weight: bold;
            color: #555;
            margin-bottom: 10px;
        }
        .dni-container {
             margin-top: 10px;
        }

        .dni-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .dni-container input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

         
        .btn-clean {
            background-color: #dc3545 !important; /* Fondo rojo */
            border: 1px solid #dc3545 !important; /* Borde rojo */
            color: white !important; /* Texto blanco */
            font-size: 16px; /* Tamaño de texto */
            padding: 8px 16px; /* Espaciado interior */
            border-radius: 4px; /* Bordes redondeados */
            display: inline-flex;
            align-items: center; /* Centra los iconos y el texto */
            justify-content: center; /* Centra los iconos y el texto */
            transition: background-color 0.3s, border-color 0.3s, color 0.3s; /* Transición suave */
        }

        /* Estilo para el icono */
        .btn-clean i {
            margin-right: 8px; /* Espacio entre el icono y el texto */
        }

        /* Efecto al pasar el mouse por encima */
        .btn-clean:hover {
            background-color: #c82333 !important; /* Fondo rojo más oscuro al pasar el ratón */
            border-color: #c82333 !important; /* Borde rojo más oscuro */
            color: white !important; /* Texto blanco */
        }

        /* Estilo para el enfoque (focus) */
        .btn-clean:focus {
            outline: none; /* Elimina el contorno por defecto */
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25); /* Sombra de enfoque roja */
        }

        /* Estilo para el estado activo (cuando se hace clic en el botón) */
        .btn-clean:active {
            background-color: #bd2130 !important; /* Fondo rojo más intenso al hacer clic */
            border-color: #bd2130 !important; /* Borde rojo más intenso al hacer clic */
            color: white !important; /* Texto blanco al hacer clic */
        }



        footer {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 188px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Reseñas</h2>
        <ul>
            <li><a href="http://localhost/daviplata/VistaClientes">Regresar</a></li>
            <li><a href="http://localhost/daviplata/Rese%C3%B1a#">Mis Reseñas</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h1>Mis Reseñas</h1>

            <table id="tblReseñas" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de subida</th>
                        <th>Comentario</th>
                        <th>Calificación</th>
                        <th>DNI</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTables se encargará de llenar el contenido -->
                </tbody>
            </table>
        </div>
    

    <div class="form-container">
            <h2>Agregar Nueva Reseña</h2>
            
            <!-- Textarea para comentario -->
            <textarea id="comentario" placeholder="Escribe tu comentario aquí..." rows="4"></textarea>

            <!-- Input para DNI -->
            <div class="dni-container">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" placeholder="Introduce tu DNI" required>
            </div>

            <!-- Calificación con estrellas -->
            <div class="stars" id="starContainer">
                <span data-value="1">&#9733;</span>
                <span data-value="2">&#9733;</span>
                <span data-value="3">&#9733;</span>
                <span data-value="4">&#9733;</span>
                <span data-value="5">&#9733;</span>
            </div>

            <div class="rating-description" id="ratingDescription">
                Selecciona una calificación
            </div>
    
    
            <button onclick="registrarReseña()">Enviar Reseña</button>
            <button class="btn btn-clean" onclick="clearMessage()"><i class="fas fa-trash-alt"></i> Limpiar</button>
    </div>

    <div id="editar_resena" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
                <div class="modal-content" style="border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
                    <div class="modal-header" style="background: #800000; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                        <h5 class="modal-title font-weight-bold" id="title" style="color: white;">Editar Reseña</h5>
                    </div>

                    <div class="modal-body" style="padding: 30px;">
                        <form method="post" id="frmResena">
                            <input type="hidden" id="id_resena" name="id_resena">

                            <!-- Campo de comentario -->
                            <div class="form-group">
                                <label for="comentario">Comentario</label>
                                <textarea id="comentario_modal" class="form-control" name="comentario" rows="5" placeholder="Ingrese su comentario" required></textarea>
                            </div>

                            <!-- Campo de calificación (1 a 5) -->
                            <div class="form-group">
                                <label for="calificacion">Calificación</label>
                                <select id="calificacion" class="form-control" name="calificacion" required>
                                    <option value="1">1 - Muy Mala</option>
                                    <option value="2">2 - Mala</option>
                                    <option value="3">3 - Regular</option>
                                    <option value="4">4 - Buena</option>
                                    <option value="5">5 - Excelente</option>
                                </select>
                            </div>

                            <!-- Botones de acción -->
                            <div class="form-group d-flex justify-content-between" style="margin-top: 20px;">
                                <button class="btn btn-danger" type="button" onclick="cancelarFormulario()" data-dismiss="modal" id="cancelar-btn">Cancelar</button>
                                <button class="btn btn-secondary" type="button" onclick="limpiarFormulario();">Limpiar</button>
                                <button class="btn btn-primary" type="button" onclick="modificarResena(event);" id="btnAccion">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <footer>
        © 2024 Servicios Financieros - Todos los Derechos Reservados
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       

    <script>
        const stars = document.querySelectorAll('#starContainer span');
        const ratingDescription = document.getElementById('ratingDescription');
        const base_url = "http://localhost/daviplata/";
        let tblReseñas;

        document.addEventListener("DOMContentLoaded", function () {
            $(document).ready(function() {
                tblReseñas = $('#tblReseñas').DataTable({
                    "lengthChange": false,   // Desactiva "Show entries"
                    "paging": true,          // Habilita la paginación
                    "searching": true,       // Habilita la búsqueda
                    "info": true,            // Muestra la información (total de registros)
                    "ajax": {
                        "url": base_url + "reseña/listarReseñas",  // URL para obtener las reseñas
                        "dataSrc": function (json) {
                            console.log("Datos recibidos del servidor:", json); // Verifica los datos recibidos
                            return json; // Retorna los datos sin modificar
                        }
                    },
                    "columns": [
                        { 'data': 'id' },                       // ID de la reseña
                        { 'data': 'Fecha_subida' },             // Fecha en que se subió la reseña
                        { 'data': 'Comentario' },               // Comentario de la reseña
                        {
                            'data': 'Calificacion',             // Calificación de la reseña
                            'render': function (data) {
                                // Renderizar la calificación con colores y etiquetas
                                let calificacionHtml;
                                if (data >= 4) {
                                    calificacionHtml = `<span style="color: white; background-color: #28a745; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">Excelente</span>`;
                                } else if (data >= 3) {
                                    calificacionHtml = `<span style="color: white; background-color: #ffc107; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">Bueno</span>`;
                                } else {
                                    calificacionHtml = `<span style="color: white; background-color: #dc3545; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">Malo</span>`;
                                }
                                return calificacionHtml;  // Devuelve el HTML de la calificación
                            }
                        },
                        {
                            'data': 'DNI',                      // DNI asociado a la reseña
                            'render': function (data) {
                                return `<span>${data}</span>`;
                            }
                        },
                        {
                            'data': null,                       // Columna para acciones (editar, eliminar)
                            'render': function (data, type, row) {
                                return `
                                    <button class="btn btn-warning btn-sm" onclick="editarReseña(${row.id})">Editar</button>
                                    <button class="btn btn-danger btn-sm" onclick="eliminarReseña(${row.id})">Eliminar</button>
                                `;
                            }
                        }
                    ]
                });

                // Recargar la tabla
                $('#reloadTable').on('click', function () {
                    tblReseñas.ajax.reload(null, false); 
                });
            });
        });

        const descriptions = {
            1: 'Deficiente',
            2: 'Regular',
            3: 'Aceptable',
            4: 'Bueno',
            5: 'Excelente',
        };

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = parseInt(star.getAttribute('data-value'));
                
                // Reset stars
                stars.forEach(s => s.classList.remove('active'));
                
                // Activate stars up to the selected one
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('active');
                }
                
                // Update description
                ratingDescription.textContent = descriptions[value];
            });
        });

        function obtenerCalificacionYDNI() {
            // Obtener la calificación desde las estrellas activas
            const stars = document.querySelectorAll('#starContainer span.active');
            const calificacion = stars.length; // Número de estrellas activas representa la calificación

            const dni = document.getElementById("dni").value;

            // Validaciones
            if (!calificacion || calificacion < 1 || calificacion > 5) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Selecciona una calificación válida entre 1 y 5 estrellas',
                    showConfirmButton: false,
                    timer: 3000,
                    customClass: { popup: 'swal2-center' }
                });
                return null;
            }

            if (!dni || dni.length !== 10 || !/^\d+$/.test(dni)) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'El DNI No puede estar vacio Y debe de tener 10 digitos',
                    showConfirmButton: false,
                    timer: 3000,
                    customClass: { popup: 'swal2-center' }
                });
                return null;
            }

            return { calificacion, dni };
        }

        function registrarReseña(callback) {
            // Verificamos si los elementos están disponibles antes de acceder a ellos
            const comentarioElem = document.getElementById("comentario");
            const dniElem = document.getElementById("dni");
            const valores = obtenerCalificacionYDNI();

            if (!valores) return; // Detener si hay errores en los valores

            const { calificacion, dni } = valores;

            // Obtener el valor del comentario directamente y validarlo
            const comentario = comentarioElem ? comentarioElem.value.trim() : ''; // Aseguramos que el valor sea un string limpio
            console.log('Comentario:', comentario); // Verifica el valor en la consola

            // Validación del comentario
            if (!comentario) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'El comentario no puede estar vacío',
                    showConfirmButton: false,
                    timer: 3000,
                    customClass: { popup: 'swal2-center' }
                });
                return;
            }

            // Verificamos que el campo DNI también esté disponible
            if (!dniElem || !dniElem.value.trim()) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'El DNI no puede estar vacío',
                    showConfirmButton: false,
                    timer: 3000,
                    customClass: { popup: 'swal2-center' }
                });
                return;
            }

            const url = base_url + "Reseña/registrarReseña";
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.setRequestHeader("Content-Type", "application/json");

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    try {
                        let res;
                        try {
                            res = JSON.parse(this.responseText);
                        } catch (error) {
                            res = { success: false, message: this.responseText };
                        }

                        if (res.success) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Reseña registrada con éxito',
                                showConfirmButton: false,
                                timer: 3000,
                                customClass: { popup: 'swal2-center' }
                            });
                            cargarReseñas();
                            if (comentarioElem) comentarioElem.value = "";
                            if (dniElem) dniElem.value = "";
                            document.getElementById("calificacion").value = "";
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: res.message || 'Hubo un error al registrar la reseña',
                                showConfirmButton: false,
                                timer: 3000,
                                customClass: { popup: 'swal2-center' }
                            });
                        }
                    } catch (error) {
                        console.error("Error al procesar la respuesta JSON:", error);
                    }
                }
            };

            http.send(JSON.stringify({ comentario, calificacion, dni }));
        }

        document.addEventListener("DOMContentLoaded", function() {
            cargarReseñas(); // Carga las reseñas cuando el documento esté listo
        });

        function cargarReseñas() {
            const url = base_url + "Reseña/listarReseñas"; // URL de la función listarReseñas en el controlador

            fetch(url, {
                method: "GET",
                headers: { "X-Requested-With": "XMLHttpRequest" }
            })
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector("#tblReseñas tbody");
                tableBody.innerHTML = ""; // Limpia la tabla antes de llenarla nuevamente

                // Verifica si los datos están disponibles
                if (data && Array.isArray(data)) {
                    data.forEach(reseña => {
                        // Verifica que el campo ID exista en los datos de la reseña
                        const id = reseña.id || reseña.ID_RESEÑA || reseña.ID; // Ajusta según el campo correcto de tu respuesta

                        // Definir el estilo para el campo de calificación
                        let calificacionHtml;
                        if (reseña.Calificacion >= 4) {
                            calificacionHtml = `<span style="color: white; background-color: #28a745; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">Excelente</span>`;
                        } else if (reseña.Calificacion >= 3) {
                            calificacionHtml = `<span style="color: white; background-color: #ffc107; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">Bueno</span>`;
                        } else {
                            calificacionHtml = `<span style="color: white; background-color: #dc3545; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">Malo</span>`;
                        }

                        // Crear una fila para la tabla
                        const row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${id}</td> <!-- Agregar el ID de la reseña -->
                            <td>${reseña.Fecha_subida}</td>
                            <td>${reseña.Comentario}</td>
                            <td>${calificacionHtml}</td>
                            <td>${reseña.DNI}</td>
                            <td>
                                <!-- Colocar los botones de editar y eliminar en la misma columna -->
                                <button class="btn btn-warning btn-sm" type="button" onclick="editarReseña(${id});">Editar</button>
                                <button class="btn btn-danger btn-sm" type="button" onclick="eliminarReseña(${id});">Eliminar</button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    console.error("Datos de reseñas no válidos:", data);
                }
            })
            .catch(error => console.error("Error al cargar las reseñas:", error));
        }

        function clearMessage() {
            const comentarioField = document.querySelector('#comentario');  // Asegúrate de que el id coincida con el del campo de comentario
            if (comentarioField) {
                comentarioField.value = '';  // Limpiar el valor del campo
            }
        }

        function editarReseña(id) { 
            document.getElementById("title").innerHTML = "Editar Reseña";
            document.getElementById("btnAccion").innerHTML = "Modificar";

            const url = base_url + "reseña/editarResena/" + id;

            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            http.send();

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    try {
                        const res = JSON.parse(this.responseText);

                        if (res.error) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: res.error,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {
                            // Asignar valores a los campos dentro del modal
                            document.getElementById("id_resena").value = res.id;
                            document.getElementById("comentario_modal").value = res.comentario; // Comentario del modal
                            document.getElementById("calificacion").value = res.calificacion; // Calificación
                            // Mostrar el modal
                            $("#editar_resena").modal("show");
                        }

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

        function cancelarFormulario() {
            // Limpiar los campos del formulario
            document.getElementById("frmResena").reset();

            // Cerrar el modal (esto lo hace el data-dismiss automáticamente, pero se asegura de limpiar el formulario también)
            $('#editar_resena').modal('hide');
        }

        function limpiarFormulario() {
            // Limpiar el campo de comentario
            const comentario = document.getElementById("comentario_modal");
            if (comentario) {
                comentario.value = ""; // Limpia el valor del comentario
            } else {
                console.error("Campo de comentario no encontrado.");
            }
        }

        function modificarResena(event) {
            event.preventDefault();
            
            const id = document.getElementById("id_resena").value;
            const comentario = document.getElementById("comentario_modal").value.trim(); // eliminamos espacios en blanco
            const calificacion = document.getElementById("calificacion").value;

            // Validación: que el comentario no esté vacío
            if (comentario === "") {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'El comentario no puede estar vacío',
                    showConfirmButton: false,
                    timer: 3000
                });
                return;
            }

            // Confirmación de SweetAlert2
            Swal.fire({
                title: "¿Estás seguro de modificar la reseña?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, modificar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = base_url + "Reseña/modificar";
                    const data = new FormData();
                    data.append("id", id);
                    data.append("comentario", comentario);
                    data.append("calificacion", calificacion);

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
                                    title: 'Reseña modificada correctamente',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $("#editar_resena").modal("hide");
                                cargarReseñas(); // Llamas a la función que actualiza la vista de reseñas
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Error al modificar la reseña',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        }
                    };
                }
            });
        }
        
        function eliminarReseña(id) {
            // Confirmación de eliminación con SweetAlert
            Swal.fire({
                title: "¿Estás seguro de eliminar esta reseña?",
                text: "¡Esta acción no se puede deshacer!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = base_url + "reseña/eliminar"; // Asegúrate de que la URL es correcta
                    const data = new FormData();
                    data.append("id", id);

                    const http = new XMLHttpRequest();
                    http.open("POST", url, true);
                    http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                    http.send(data);

                    http.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            const res = this.responseText.trim();
                            if (res === "eliminado") {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Reseña eliminada correctamente',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                cargarReseñas();
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Error al eliminar la reseña',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        }
                    };
                }
            });
        }


    </script>


    
</body>

</html>

