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

