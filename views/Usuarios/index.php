<?php include "views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4" style="background-color: #e9ecef; border-radius: 0.5rem; padding: 15px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
  <li class="breadcrumb-item active" style="color: #343a40; font-weight: bold;">Usuarios</li>
</ol>

<button class="btn btn-primary mb-2" type="button"> Nuevo </button>

<table class="table table-light " id="tblUsuarios">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Caja</th>
            <th>estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>



<?php include "views/Templates/footer.php"; ?>
