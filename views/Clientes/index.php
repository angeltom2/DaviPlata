<?php include "views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4" style="background-color: #e9ecef; border-radius: 0.5rem; padding: 15px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
  <li class="breadcrumb-item active" style="color: #343a40; font-weight: bold;">Clientes</li>
</ol>

<button class="btn btn-primary mb-2" type="button" onclick="frmCliente();"><i class="fas fa-plus"></i> </button>

<table class="table table-light" id="tblClientes">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>direccion</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
    <div class="modal-content" style="border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
      <div class="modal-header bg-primary text-white" style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
        <h5 class="modal-title" id="title">Nuevo Cliente</h5>
      </div>
      <div class="modal-body" style="padding: 30px;">
        <form method="post" id="frmCliente">

          <div class="form-group">
            <label for="dni">dni</label>
            <input type="hidden" id="id" name="id">
            <input id="dni" class="form-control" type="text" name="dni" placeholder="Ingrese el dni" required>
          </div>

          <div class="form-group">
            <label for="nombre">Nombre Completo</label>
            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre completo" required>
          </div>

          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Ingrese número telefónico" required>
          </div>

          <!-- Nuevo campo para la dirección -->
          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Ingrese la dirección" required>
          </div>

          <div class="row" id="claves">
            <div class="col-md-6">
              <div class="form-group">
                <label for="clave">Contraseña</label>
                <input id="clave" class="form-control" type="password" name="clave" placeholder="Ingrese la contraseña" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirmar">Confirmar Contraseña</label>
                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirme la contraseña" required>
              </div>
            </div>
          </div>
          <div class="form-group d-flex justify-content-between" style="margin-top: 20px;">
            <button class="btn btn-danger" type="button" data-dismiss="modal" id="cancelar-btn">Cancelar</button>
            <button class="btn btn-secondary" type="button" onclick="limpiarFormularioCliente();">Limpiar</button>
            <button class="btn btn-primary" type="button" onclick="registrarcliente(event);" id="btnAccion">Registrar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>


<?php include "views/Templates/footer.php"; ?>
