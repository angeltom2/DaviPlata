<?php include "views/Templates/header.php"; ?>

<div style="margin-bottom: 20px; text-align: center;">
    <h1 style="font-size: 2.5rem; font-weight: bold; color: black; text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7);">Reseñas</h1>
</div>

<style>
    /* Estilos personalizados para la tabla */
    .table-container {
        max-width: 100%;
        margin: 30px 0;
        padding: 10px;
    }

    .table {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
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
        <table id="tblReseñas" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de subida</th>
                        <th>Comentario</th>
                        <th>Calificación</th>
                        <th>DNI</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
</div>



<?php include "views/Templates/footer.php"; ?>