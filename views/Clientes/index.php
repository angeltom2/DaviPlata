<?php include "views/Templates/header.php"; ?>

<div style="text-align: center; margin-bottom: 22px;">
    <span style="font-weight: bold; font-size: 2.5rem; color: black;">Clientes</span>
</div>


<button class="btn" style="background: #800000; color: white; font-weight: bold; border: none; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); margin-bottom: 10px;" type="button" onclick="frmCliente();">
    <i class="fas fa-plus"></i> Agregar Cliente
</button>

<style>
    /* Estilos personalizados para la tabla */
    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Encabezados de la tabla */
    .table th {
        background-color: #800000; /* Rojo oscuro */
        color: white; /* Texto blanco */
        font-weight: bold;
        padding: 15px; /* Añadir padding para mejorar el espaciado */
    }

    .table td {
        padding: 15px;
        text-align: center; /* Centrar texto en las celdas */
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa; /* Color de fondo para filas pares */
    }

    .table tbody tr:hover {
        background-color: #e9ecef; /* Color al pasar el mouse */
    }

    .table button {
        margin: 0 5px; /* Espaciado entre botones */
    }
</style>

<table class="table table-light" id="tblClientes" style="margin-top: 10px;">
    <thead>
        <tr>
            <th>Id</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Dirección</th>
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
      <div class="modal-header" style="background: #800000; border-top-left-radius: 12px; border-top-right-radius: 12px;">
        <h5 class="modal-title font-weight-bold" id="title" style="color: white;">Nuevo Cliente</h5>
      </div>
      <div class="modal-body" style="padding: 30px;">
        <form method="post" id="frmCliente">
          <div class="form-group">
            <label for="dni">DNI</label>
            <input type="hidden" id="id" name="id">
            <input id="dni" class="form-control" type="text" name="dni" placeholder="Ingrese el DNI" required>
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
