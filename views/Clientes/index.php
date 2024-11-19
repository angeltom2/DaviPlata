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
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        margin-top: 30px;
        background-color: #ffffff;
    }

    /* Encabezados de la tabla */
    .table th {
        background-color: #800000; /* Rojo oscuro */
        color: white; /* Texto blanco */
        font-weight: bold;
        padding: 18px;
        text-align: center;
        letter-spacing: 1px; /* Espaciado de letras */
        font-size: 16px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .table td {
        padding: 18px;
        text-align: center;
        font-size: 15px;
        color: #333;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover {
        background-color: #e0e0e0; /* Efecto hover con un color más sutil */
    }

    .table button {
        margin: 0 8px;
    }

    /* Estilos para el modal */
    .modal-content {
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        background-color: #ffffff;
    }

    .modal-header {
        background-color: #28a745;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .modal-title {
        color: white;
        font-size: 18px;
        font-weight: bold;
    }

    .modal-body {
        padding: 35px;
    }

    .modal-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .modal-footer button {
        margin: 0 8px;
    }

    /* Estilos mejorados para los botones */
    .btn-danger, .btn-success, .btn-secondary {
        border-radius: 50px; /* Botón completamente redondeado */
        padding: 8px 16px; /* Reducción de padding para hacerlo más pequeño */
        font-size: 14px; /* Reducir tamaño de fuente */
        font-weight: 600;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.2s ease;
        cursor: pointer;
    }

    /* Botón Solucionar - Éxito */
    .btn-success {
        background-color: #28a745;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-success:hover {
        background-color: #218838;
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    .btn-success:active {
        transform: translateY(2px); /* Efecto al hacer clic */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Botón de alerta - Peligro */
    .btn-danger {
        background-color: #dc3545;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    .btn-danger:active {
        transform: translateY(2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Botón de estado - Neutro */
    .btn-secondary {
        background-color: #6c757d;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary:active {
        transform: translateY(2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn:hover {
        opacity: 0.9;
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
