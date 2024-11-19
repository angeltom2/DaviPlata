<?php include "views/Templates/header.php"; ?>

<div style="margin-bottom: 20px; text-align: center;">
    <h1 style="font-size: 2.5rem; font-weight: bold; color: black; text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7);">Tickets</h1>
</div>

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

<div class="table-container">
    <table id="tblTickets" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Subida</th>
                <th>Queja</th>
                <th>Prioridad</th>
                <th>Status</th>
                <th>Solución</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="solucionar_ticket" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
    <div class="modal-content" style="border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
      <div class="modal-header" style="background: #28a745; border-top-left-radius: 12px; border-top-right-radius: 12px;">
        <h5 class="modal-title font-weight-bold" id="title" style="color: white;">Solucionar Ticket</h5>
      </div>

      <div class="modal-body" style="padding: 30px;">
        <form method="post" id="frmSolucionarTicket">
          <input type="hidden" id="id_ticket_solucionar" name="id_ticket_solucionar">
          
          <!-- Campo para la queja (solo lectura) -->
          <div class="form-group">
            <label for="queja_solucionar">Queja</label>
            <textarea id="queja_solucionar" class="form-control" name="queja_solucionar" rows="5" placeholder="La queja del ticket..." readonly></textarea>
          </div>

          <!-- Campo para la solución -->
          <div class="form-group">
            <label for="solucion">Solución</label>
            <textarea id="solucion" class="form-control" name="solucion" rows="5" placeholder="Ingrese la solución aquí" required></textarea>
          </div>

          <div class="form-group d-flex justify-content-between" style="margin-top: 20px;">
            <button class="btn btn-danger" type="button" data-dismiss="modal" id="cancelar-btn">Cancelar</button>
            <button class="btn btn-secondary" type="button" onclick="limpiarFormularioTicket();">Limpiar</button>
            <button class="btn btn-success" type="button" onclick="DarSolucion(event);" id="btnSolucionar">Solucionar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<?php include "views/Templates/footer.php"; ?>