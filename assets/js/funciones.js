let tblUsuarios;
document.addEventListener("DOMContentLoaded", function() {
    // Inicializa DataTable
    tblUsuarios = $('#tblUsuarios').DataTable({ 
        ajax: {
            url: base_url + "usuarios/listar",
            dataSrc: function(json) {
                console.log("Datos recibidos del servidor:", json); // Verifica los datos recibidos
                return json; // Retorna los datos sin modificar
            }
        },
        columns: [
            { 'data': 'id' },
            { 'data': 'usuario' },
            { 'data': 'nombre' },
            { 'data': 'caja' },
            {
                'data': 'estado',
                'render': function(data) {
                    const estado = data.includes("Activo") ? 'Activo' : 'Inactivo';
                    const color = estado === 'Activo' ? '#28a745' : '#dc3545'; // Verde para Activo, Rojo para Inactivo
                    return `<span style="color: white; background-color: ${color}; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">${estado}</span>`; // Estilo atractivo y centrado
                }
            },
            { 'data': 'acciones' }
        ]
    });

    // Evento para recargar manualmente la tabla cuando se haga clic en el botón
    $('#reloadTable').on('click', function() {
        tblUsuarios.ajax.reload(null, false); // Recarga sin reiniciar la paginación
    });
});









// Función de login
function frmlogin(e) {
    e.preventDefault();

    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");

    if (usuario.value == "") {
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    } else if (clave.value == "") {
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    } else {
        const url = base_url + "Usuarios/validar";

        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);

        http.setRequestHeader("X-Requested-With", "XMLHttpRequest");

        http.send(new FormData(frm));

        http.onreadystatechange = function() {
            if (this.readyState == 4) {
                console.log("Respuesta del servidor:", this.responseText); // Añade esto para ver la respuesta en consola
                if (this.status == 200) {
                    try {
                        const res = JSON.parse(this.responseText); // Intenta parsear el JSON
                        if (res == "ok") {
                            window.location = base_url + "usuarios";
                        } else {
                            document.getElementById("alerta").classList.remove("d-none");
                            document.getElementById("alerta").innerHTML = res;
                            alert(res);
                        }
                    } catch (error) {
                        console.error("Error al parsear el JSON:", error);
                        document.getElementById("alerta").classList.remove("d-none");
                        document.getElementById("alerta").innerHTML = "Error en la respuesta del servidor. No es un JSON válido.";
                    }
                } else {
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = "Error en la solicitud. Código: " + this.status;
                }
            }
        }
        
        
    }
}
