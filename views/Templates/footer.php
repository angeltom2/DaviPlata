</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted" style "color:black">Copyright &copy; Your Website 2023</div>
        
        </div>
    </div>
</footer>
</div>
</div>

<div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #800000; color: white;">
        <h5 class="modal-title">Modificar Contraseña</h5>
      </div>
      <div class="modal-body">
        <form id="frmCambiarPass">
          <div class="form-group">
            <label for="clave_actual">Contraseña Actual</label>
            <input id="clave_actual" class="form-control" type="password" name="clave_actual" placeholder="Contraseña Actual" required>
          </div>
          <div class="form-group">
            <label for="clave_nueva">Contraseña Nueva</label>
            <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Nueva contraseña" required>
          </div>
          <div class="form-group">
            <label for="confirmar_clave">Confirmar Contraseña</label>
            <input id="confirmar_clave" class="form-control" type="password" name="confirmar_clave" placeholder="Confirmar contraseña" required>
          </div>

          <div class="form-group text-right" style="margin-top: 20px;">
          <button class="btn btn-primary" type="button" onclick="frmCambiarPass(event);" id="btnAcciones"> modificar </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {

    $(document).ready(function () {
        tblTickets = $('#tblTickets').DataTable({
            "lengthChange": false,
            "paging": true,
            "searching": true,
            "info": true,
            "ajax": {
                "url": base_url + "Adminticket/listarTodos",
                "dataSrc": function (json) {
                    // Verificar si la respuesta contiene un error
                    if (json.error) {
                        console.error("Error en la respuesta JSON:", json.error);
                        alert("Error en la respuesta JSON: " + json.error);
                        return [];
                    } else {
                        // Ordenar los tickets por prioridad: Alta -> Media -> Baja
                        json.sort((a, b) => {
                            const prioridades = { "Alta": 3, "Media": 2, "Baja": 1 };
                            return prioridades[b.priority] - prioridades[a.priority];
                        });

                        console.log("Datos recibidos del servidor:", json);
                        return json;
                    }
                },
                "error": function (xhr, error, thrown) {
                    console.error("Error en la llamada AJAX:", error, thrown);
                    console.log("Respuesta del servidor:", xhr.responseText);
                    alert("Error al cargar los datos. Verifique la consola para más detalles.");
                }
            },
            "columns": [
                { 'data': 'id' },
                { 'data': 'fecha_subida' },
                { 'data': 'queja' },
                { 'data': 'priority' },
                {
                    'data': 'status',
                    'render': function (data) {
                        // Definir el estado y color según el contenido de "status"
                        const estado = data.includes("Abierto") ? 'Abierto' :
                                       data.includes("Cerrado") ? 'Cerrado' : 'En Progreso';
                        const color = estado === 'Abierto' ? '#ffc107' : 
                                      estado === 'Cerrado' ? '#dc3545' : '#17a2b8'; // Amarillo, Verde, Azul

                        // Retornar el span con el formato aplicado
                        return `<span style="color: white; background-color: ${color}; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center; font-size: 13px;">${estado}</span>`;
                    }
                },
                { 'data': 'solucion' },
                {
                    'data': null,
                    'render': function (data, type, row) {
                        return `<button class="btn btn-success btn-sm" onclick="SolucionarTicket(${row.id})">Solucionar</button>
                                <button class="btn btn-primary btn-sm" onclick="AbrirTicket(${row.id})">Abrir Ticket</button>`;
                                
                    }
                }
            ],
            "drawCallback": function(settings) {
                // Aseguramos que los estilos se apliquen después de que la tabla se haya renderizado
                setTimeout(function() {
                    $('#tblTickets tbody tr').each(function() {
                        var row = $(this);
                        var statusCell = row.find('td').eq(4); // Suponiendo que el status está en la columna 4
                        if (statusCell.length > 0) {
                            // Ajusta el color del texto según el status
                            var statusText = statusCell.text().trim();
                            if (statusText === 'Abierto') {
                                statusCell.css("color", "#ffc107");
                            } else if (statusText === 'Cerrado') {
                                statusCell.css("color", "#28a745");
                            } else if (statusText === 'En Progreso') {
                                statusCell.css("color", "#17a2b8");
                            }
                        }
                    });
                }, 100); // Retrasa la ejecución 100ms para asegurar que los elementos estén en el DOM
            }
        });

        // Botón para recargar la tabla
        $('#reloadTable').on('click', function () {
            tblTickets.ajax.reload(null, false);
        });
    });
    });

    $(document).ready(function () {
                tblReseñas = $('#tblReseñas').DataTable({
                    "lengthChange": false,   // Desactiva "Show entries"
                    "paging": true,          // Habilita la paginación
                    "searching": true,       // Habilita la búsqueda
                    "info": true,            // Muestra la información (total de registros)
                    "ajax": {
                        "url": base_url + "AdminReseña/listarReseñas",  // URL para obtener las reseñas
                        "dataSrc": function (json) {
                            console.log("Datos recibidos del servidor:", json); // Verifica los datos recibidos
                            return json; // Retorna los datos sin modificar
                        }
                    },
                    "columns": [
                        { 'data': 'id' },                // ID de la reseña
                        { 'data': 'Fecha_subida' },      // Fecha en que se subió la reseña
                        { 'data': 'Comentario' },        // Comentario de la reseña
                        {
                            'data': 'Calificacion',      // Calificación de la reseña
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
                            'data': 'DNI',               // DNI asociado a la reseña
                            'render': function (data) {
                                return `<span>${data}</span>`;
                            }
                        }
                    ]
                });

                // Recargar la tabla
                $('#reloadTable').on('click', function () {
                    tblReseñas.ajax.reload(null, false); 
                });
    });

    function SolucionarTicket(id) {
    document.getElementById("title").innerHTML = "Solucionar Ticket";
    const url = base_url + "AdminTicket/solucionar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                // Mostrar la respuesta real que recibimos para depuración
                console.log("Respuesta del servidor:", this.responseText);

                // Verificar si la respuesta es de tipo JSON
                const contentType = http.getResponseHeader("Content-Type");
                if (contentType && contentType.indexOf("application/json") !== -1) {
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
                            // Asignar los valores al formulario del modal
                            document.getElementById("id_ticket_solucionar").value = res.id;
                            document.getElementById("queja_solucionar").value = res.queja;  // Campo solo lectura
                            document.getElementById("solucion").value = '';  // Campo vacío para que el administrador ingrese la solución

                            // Mostrar el modal para solucionar el ticket
                            $("#solucionar_ticket").modal("show");
                        }
                    } catch (error) {
                        console.error("Error parsing JSON:", error);
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'La respuesta del servidor no es un JSON válido',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                } else {
                    console.error("La respuesta no es de tipo JSON:", this.responseText);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'La respuesta del servidor no es un JSON válido',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            } else {
                console.error("Error en la solicitud:", this.status);
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error en la solicitud del servidor',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    };
    }


    function limpiarFormularioTicket() {    
    // Limpiar solo el campo de solución
    const solucionField = document.getElementById("solucion");
    if (solucionField) {
        solucionField.value = ''; // Limpiar el campo de solución
    }
    }   

    document.getElementById("cancelar-btn").addEventListener("click", function() {
    // Cerrar el modal manualmente
    $('#solucionar_ticket').modal('hide');
    });

    function DarSolucion(event) {
    event.preventDefault();

    const idTicket = document.getElementById("id_ticket_solucionar").value;
    const solucion = document.getElementById("solucion").value.trim();

    // Validación: que la solución no esté vacía
    if (solucion === "") {
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'La solución no puede estar vacía',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }

    // Confirmación de SweetAlert2
    Swal.fire({
        title: "¿Estás seguro de solucionar el ticket?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, solucionar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "AdminTicket/solucionarTicket";
            const data = {
                id: idTicket,
                solucion: solucion,
                status: 'Cerrado' // Estado del ticket
            };

            // Usamos Fetch API para enviar la solicitud
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.text())  // Cambiamos a .text() para ver el contenido exacto
            .then(text => {
                console.log("Respuesta completa del servidor:", text); // Ver la respuesta completa

                let data;
                try {
                    data = JSON.parse(text); // Intentamos convertir a JSON
                } catch (error) {
                    console.error("Error al analizar JSON:", error, "Respuesta recibida:", text);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'La respuesta del servidor no es un JSON válido',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    return; // Termina aquí si no es JSON
                }

                // Verificar si la respuesta contiene un éxito
                if (data.success) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ticket solucionado correctamente',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('#solucionar_ticket').modal('hide');

                    actualizarTablaTickets();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: data.error || 'Error al solucionar el ticket',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            })
            .catch(error => {
                console.error('Error al enviar la solicitud:', error);
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Hubo un error al enviar la solicitud',
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        }
    });
    }

    function actualizarTablaTickets() {
    // Hacer una solicitud para obtener los tickets actualizados
    fetch(base_url + 'AdminTicket/obtenerTickets')
        .then(response => response.json())
        .then(tickets => {
            // Suponiendo que 'tickets' es un array con los tickets actualizados
            // Recargar la tabla con los nuevos datos
            tblTickets.clear().rows.add(tickets).draw();

            // Aplicar los estilos después de que los datos sean cargados
            $('#tblTickets tbody tr').each(function() {
                var row = $(this);
                var statusCell = row.find('td').eq(4); // Suponiendo que el status está en la columna 4
                if (statusCell.length > 0) {
                    // Ajusta el color del texto según el status
                    var statusText = statusCell.text().trim();
                    if (statusText === 'Abierto') {
                        statusCell.css("color", "#ffc107");
                    } else if (statusText === 'Cerrado') {
                        statusCell.css("color", "#28a745");
                    } else if (statusText === 'En Progreso') {
                        statusCell.css("color", "#17a2b8");
                    }
                }
            });
        })
        .catch(error => console.error('Error al actualizar la tabla de tickets:', error));
    }

    
    function AbrirTicket(id) {
    // SweetAlert2 de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: "La solución será borrada y el estado cambiará a 'Abierto'.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, abrir el ticket',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, hacemos una solicitud AJAX para cambiar el estado y borrar la solución
            fetch(base_url + 'Adminticket/abrirTicket', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Si la operación fue exitosa, recargamos la tabla
                    tblTickets.ajax.reload(null, false);
                    Swal.fire(
                        '¡Ticket abierto!',
                        'El estado del ticket ha sido cambiado a "Abierto" y la solución ha sido borrada.',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Error',
                        'No se pudo abrir el ticket, por favor intente nuevamente.',
                        'error'
                    );
                }
            })
            .catch(error => {
                console.error('Error al abrir el ticket:', error);
                Swal.fire(
                    'Error',
                    'Hubo un problema con la solicitud. Intente nuevamente.',
                    'error'
                );
            });
        }
    });
    }

    ////////////////////////////////////////////////////////////////////////////////////////////




</script>

<script>
    $(document).ready(function(){
        $('.dropdown-item').click(function(){
         $('#cambiarPass').modal('show');
        });
    });
</script>

<script>
    const base_url = "<?php echo base_url; ?>";
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { frmUsuario } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.frmUsuario = frmUsuario; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { btnEditarUser } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.btnEditarUser = btnEditarUser; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { registrarUser } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.registrarUser = registrarUser; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { limpiarFormulario } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.limpiarFormulario = limpiarFormulario; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { btneliminarUser } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.btneliminarUser = btneliminarUser; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { btnreingresarUser } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.btnreingresarUser = btnreingresarUser; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { frmCliente } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.frmCliente = frmCliente; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { limpiarFormularioCliente } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.limpiarFormularioCliente = limpiarFormularioCliente; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { registrarcliente } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.registrarcliente = registrarcliente; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { btnEditarCliente } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.btnEditarCliente = btnEditarCliente; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { btneliminarCliente } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.btneliminarCliente = btneliminarCliente; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { btnreingresarCliente } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.btnreingresarCliente = btnreingresarCliente; // Haz que la función sea global
</script>

<script type="module">  
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible
    import { frmCambiarPass } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.frmCambiarPass = frmCambiarPass; // Haz que la función sea global
</script>

<script src="<?php echo base_url; ?>assets/js/all.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js"></script>
    
</body>
</html>

