let tblUsuarios;

document.addEventListener("DOMContentLoaded", function() {
    tblUsuarios = $('#tblUsuarios').DataTable({ 
        ajax: {
            url: base_url + "usuarios/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id',
            },
            {
                'data': 'usuario'
            },
            {
                'data': 'nombre'
            },
            {
                'data': 'id_caja'
            }
        ]
    });
});


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
                if (this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        window.location = base_url + "usuarios";
                    } else {
                        document.getElementById("alerta").classList.remove("d-none");
                        document.getElementById("alerta").innerHTML = res;
                        alert(res);
                    }
                } else {
                    
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = "Error en la solicitud. Código: " + this.status;
                }
            }
        }
    }
}