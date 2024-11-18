<footer class="footer-section">
    <div class="container">
        <div class="footer-content">
            <div class=" text-center"> <!-- Contenedor para el botón "Volver" -->
                <button class="btn-volver" onclick="scrollToTop();">
                    <i class="fas fa-arrow-up"></i> Volver
                </button>
            </div>
            
            <div class="col-md-4 text-center"> <!-- Contenedor combinado para mensaje y descargas -->
                <p style="color:white;"><strong>¡DESCARGUE EL APP DAVIPLATA Y ACTÍVESE YA!</strong></p>
                <div class="app-download">
                    <a href="https://apps.apple.com/app/id1234567890" target="_blank">
                        <img src="assets/img/Appstore.png" alt="Descargue en App Store" />
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.daviplata" target="_blank">
                        <img src="assets/img/google.png" alt="Disponible en Google Play" />
                    </a>
                    <a href="https://appgallery.huawei.com/#/app/C123456789" target="_blank">
                        <img src="assets/img/huawei.png" alt="Explóralo en AppGallery" />
                    </a>
                </div>
            </div>

            <div class="soacial-icons"> <!-- Espacio para los iconos de redes sociales -->
                <div class="social-icons"> <!-- Iconos de redes sociales a la derecha -->
                    <a href="https://www.facebook.com/DaviPlata" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/Daviplatacaido" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/daviplataoficial/" class="social-icon" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url; ?>assets/js/VistaClientes.js" crossorigin="anonymous"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    const base_url = "http://localhost/daviplata/";
    function frmCambiarPass(e) {

        e.preventDefault(); 
        
        // Obtener valores de los campos
        const actual = document.getElementById('clave_actual').value.trim();
        const nueva = document.getElementById('clave_nueva').value.trim();
        const confirmar = document.getElementById('confirmar_clave').value.trim();

        // Validar campos vacíos
        if (actual === '' || nueva === '' || confirmar === '') {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Todos los campos son obligatorios',
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }

        // Validar coincidencia de contraseñas
        if (nueva !== confirmar) {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Las contraseñas no coinciden',
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }

        // Enviar datos al servidor
        const url = base_url + "VistaClientes/cambiarPass"; // Ruta hacia el controlador
        const frm = document.getElementById("frmCambiarPass");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));

        http.onreadystatechange = function () {
            if (this.readyState === 4) {
                let res;

                try {
                    res = JSON.parse(this.responseText); // Parsear respuesta del servidor
                } catch (error) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error al procesar la respuesta del servidor',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    return;
                }

                // Comprobar respuesta
                if (res === "ok") {
                    $("#cambiarPass").modal("hide"); // Cerrar el modal
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Contraseña modificada con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    frm.reset(); // Limpiar formulario
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res, // Mostrar mensaje del servidor
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        }
    }

    function abrirModal() {
    // Abre el modal de manera programática
    $('#cambiarPass').modal('show');
    }




</script>


<script>
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Añade un desplazamiento suave
        });
    }
</script>


</body>
</html>