<?php include "views/Templates/header.php"; ?>

<div style="margin-bottom: 20px; text-align: center;">
    <h1 style="font-size: 2.5rem; font-weight: bold; color: black; text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7);">Usuarios</h1>
</div>


<button class="btn" style="background: #800000; color: white; font-weight: bold; border: none; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); margin-bottom: 10px;" type="button" onclick="frmUsuario();">
    <i class="fas fa-plus"></i> Agregar Usuario
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
        background-color: #f8f9fa; /* Color de fondo para filas impares */
    }

    .table tbody tr:hover {
        background-color: #e9ecef; /* Color al pasar el mouse */
    }

    .table button {
        margin: 0 5px; /* Espaciado entre botones */
    }
</style>

<table class="table table-light" id="tblUsuarios" style="border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); margin-top: 10px;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Caja</th>
            <th>Estado</th>
            <th style="text-align: center;"></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
    <div class="modal-content" style="border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
    <div class="modal-header" style="background: linear-gradient(to right, #ffffff, #ffcccc); border-top-left-radius: 12px; border-top-right-radius: 12px;">
    <h5 class="modal-title font-weight-bold" id="title" style="color: black;">Nuevo Usuario</h5>
    </div>

      <div class="modal-body" style="padding: 30px;">
        <form method="post" id="frmUsuario">

          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type = "hidden" id="id" name = "id">
            <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Ingrese el usuario" required>
          </div>
          <div class="form-group">
            <label for="nombre">Nombre Completo</label>
            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre completo" required>
          </div>

          <div class="row" id = "claves">
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

          <div class="form-group">
            <label for="caja">Asignar Caja</label>
            <select id="caja" class="form-control" name="caja" required>
              <option value="">Seleccione una caja</option>
              <?php foreach ($data['cajas'] as $row) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['caja']; ?></option>
              <?php } ?> 
            </select>
          </div>
          
          <div class="form-group d-flex justify-content-between" style="margin-top: 20px;">
            <button class="btn btn-danger" type="button" data-dismiss="modal" id="cancelar-btn">Cancelar</button>
            <button class="btn btn-secondary" type="button" onclick="limpiarFormulario();"> Limpiar </button>
            <button class="btn btn-primary" type="button" onclick="registrarUser(event);" id = "btnAccion"> Registrar </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<?php include "views/Templates/footer.php"; ?>

