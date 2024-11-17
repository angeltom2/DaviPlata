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

            <div class="table-container">
                <table id="tblReseñas" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha Subida</th>
                            <th>Comentario</th>
                            <th>Calificación</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

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
                // Inicialización de la tabla DataTables
                tblReseñas = $('#tblReseñas').DataTable({
                    "lengthChange": false,   // Desactiva "Show entries"
                    "paging": true,          // Habilita la paginación
                    "searching": true,       // Habilita la búsqueda
                    "info": true,            // Muestra la información (total de registros)
                    "ajax": {
                        "url": base_url + "reseñas/listarReseñas",  // URL para obtener las reseñas
                        "dataSrc": function (json) {
                            console.log("Datos recibidos del servidor:", json); // Verifica los datos recibidos
                            return json; // Retorna los datos sin modificar
                        }
                    },
                    "columns": [
                        { 'data': 'id' },                       // ID de la reseña
                        { 'data': 'Fecha_subida' },             // Fecha en que se subió la reseña
                        { 'data': 'Comentario' },               // Comentario de la reseña
                        { 'data': 'Calificacion' },             // Calificación de la reseña
                        {
                            'data': null,                       // Columna para acciones (editar, eliminar)
                            'render': function (data, type, row) {
                                // Agrega los botones de Editar y Eliminar con las acciones correspondientes
                                return `
                                    <button class="btn btn-warning btn-sm" onclick="editarReseña(${row.id})">Editar</button>
                                    <button class="btn btn-danger btn-sm" onclick="eliminarReseña(${row.id})">Eliminar</button>
                                `;
                            }
                        }
                    ]
                });

                // Función para recargar la tabla
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
            const comentario = document.getElementById("comentario").value;
            const valores = obtenerCalificacionYDNI();

            if (!valores) return; // Detener si hay errores en los valores

            const { calificacion, dni } = valores;

            // Validación adicional del comentario
            if (!comentario.trim()) {
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

            const url = base_url + "Reseña/registrarReseña";
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.setRequestHeader("Content-Type", "application/json");

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    try {
                        // Verificar si la respuesta es válida JSON
                        let res;
                        try {
                            res = JSON.parse(this.responseText);
                        } catch (error) {
                            // Si no es un JSON válido, mostrar el mensaje como texto
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
                            document.getElementById("comentario").value = "";
                            document.getElementById("calificacion").value = "";
                            document.getElementById("dni").value = "";
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

    </script>


    
</body>

</html>

