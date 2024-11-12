<?php include "views/Templates/header.php"; ?>

<div style="margin-bottom: 20px; text-align: center;">
    <h1 style="font-size: 2.5rem; font-weight: bold; color: black; text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7);">Tickets</h1>
</div>



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