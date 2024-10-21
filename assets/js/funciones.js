let tblUsuarios;
document.addEventListener("DOMContentLoaded", function () {
    // Inicializa DataTable
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "usuarios/listar",
            dataSrc: function (json) {
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
                'render': function (data) {
                    const estado = data.includes("Activo") ? 'Activo' : 'Inactivo';
                    const color = estado === 'Activo' ? '#28a745' : '#dc3545'; // Verde para Activo, Rojo para Inactivo
                    return `<span style="color: white; background-color: ${color}; border-radius: 5px; padding: 5px 10px; font-weight: bold; display: inline-block; text-align: center;">${estado}</span>`; // Estilo atractivo y centrado
                }
            },
            { 'data': 'acciones' }
        ]
    });

    // Evento para recargar manualmente la tabla cuando se haga clic en el botón
    $('#reloadTable').on('click', function () {
        tblUsuarios.ajax.reload(null, false); // Recarga sin reiniciar la paginación
    });
});


export function frmUsuario() {
    document.getElementById("title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    console.log("La función frmUsuario fue cargada correctamente");
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}

export function frmlogin(e) {
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

        http.onreadystatechange = function () {
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


export function registrarUser(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const clave = document.getElementById("clave");
    const confirmar = document.getElementById("confirmar");
    const caja = document.getElementById("caja");
    const frm = document.getElementById("frmUsuario");
    if (usuario.value === "" || nombre.value === "" || caja.value === "") {
        Swal.fire({
            position: 'center',  // Para centrarlo
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'swal2-center'
            }
        });
        
    } else {
        const url = base_url + "Usuarios/registrar";
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));

        http.onreadystatechange = function () {
            if (this.readyState == 4) {
                console.log("Estado de la respuesta:", this.status); // Para depuración
                console.log("Respuesta del servidor:", this.responseText); // Para depuración

                if (this.status == 200) {
                    try {
                        const res = JSON.parse(this.responseText);  // Intenta convertir solo si es JSON válido
                        console.log("Respuesta procesada:", res); // Para depuración

                        if (res === "ok") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Usuario registrado con éxito',
                                showConfirmButton: false,
                                timer: 3000,
                                customClass: {
                                    popup: 'swal2-center'
                                }
                            });
                            frm.reset();
                            $("#nuevo_usuario").modal("hide");

                            // Asegúrate de que tblUsuarios está definido y es la tabla correcta
                            if (tblUsuarios) {
                                console.log("Recargando la tabla de usuarios..."); // Para depuración
                                tblUsuarios.ajax.reload();
                            } else {
                                console.error("tblUsuarios no está definido.");
                            }
                        } else if (res === "modificado") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Usuario modificado con éxito',
                                showConfirmButton: false,
                                timer: 3000,
                                customClass: {
                                    popup: 'swal2-center'
                                }
                            });
                            $("#nuevo_usuario").modal("hide");

                            if (tblUsuarios) {
                                console.log("Recargando la tabla de usuarios después de modificar..."); // Para depuración
                                tblUsuarios.ajax.reload();
                            } else {
                                console.error("tblUsuarios no está definido.");
                            }
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: res,
                                showConfirmButton: false,
                                timer: 3000,
                                customClass: {
                                    popup: 'swal2-center'
                                }
                            });
                        }
                    } catch (error) {
                        console.error("Error parsing JSON:", error);
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
                    console.error("Error en la solicitud. Estado:", this.status);
                }
            }
        }
    }
}



export function btnEditarUser(id) {
    document.getElementById("title").innerHTML = "Actualizar Usuario";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Usuarios/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText); // Agrega esta línea para ver la respuesta
            try {
                const res = JSON.parse(this.responseText);
                document.getElementById("id").value = res.id;
                document.getElementById("usuario").value = res.usuario;
                document.getElementById("nombre").value = res.nombre;
                document.getElementById("caja").value = res.id_caja;
                document.getElementById("claves").classList.add("d-none");
                $("#nuevo_usuario").modal("show");
            } catch (error) {
                console.error("Error parsing JSON:", error);
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
        }
    };

}


export function limpiarFormulario() {
    document.getElementById("frmUsuario").reset(); // Limpiar todos los campos del formulario
}

export function btneliminarUser(id) {
    Swal.fire({
        title: "¿Estas seguro de Borrar el Usuario?",
        text: "Tu no vas a poder revertir este cambio",
        icon: "Advertencia",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si , Quiero borrarlo",
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    console.log("Respuesta procesada:", res); // Para depuración
                    if ( res == "ok") {
                        Swal.fire({
                            title: "Borrado!",
                            text: "El usuario ha sido borrado con exito",
                            icon: "success"
                        });
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire({
                            title: "Borrado!",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            };
        }
    });
}

export function btnreingresarUser(id) {
    Swal.fire({
        title: "Estas seguro de Reingresar el Usuario?",
        icon: "Advertencia",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si , Reingresarlo",
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    console.log("Respuesta procesada:", res); // Para depuración
                    if ( res == "ok") {
                        Swal.fire({
                            title: "INGRESADO!",
                            text: "El usuario ha sido reingresado con exito",
                            icon: "success"
                        });
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire({
                            title: " el usuario no se a podido reingresar",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            };
        }
    });
}


document.addEventListener("DOMContentLoaded", function () {
    const cancelarBtn = document.getElementById("cancelar-btn");
    
    if (cancelarBtn) {
        cancelarBtn.addEventListener("click", function () {
            $("#nuevo_usuario").modal("hide");
        });
    } else {
        console.error("El botón cancelar-btn no se encontró en el DOM.");
    }
});









