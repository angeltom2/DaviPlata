<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tickets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />

    <style>
        body {
            font-family: 'Varela Round', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #ffffff;
            padding: 20px;
            border-right: 1px solid #ddd;
            height: 100vh;
        }
        .profile-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-info img {
            width: 80px;
            border-radius: 50%;
        }
        .menu-item {
            font-size: 1em;
            padding: 10px;
            color: #555;
            display: block;
            text-decoration: none;
            transition: 0.3s;
        }
        .menu-item:hover, .menu-item.active {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        .content {
            padding: 20px;
            width: 100%;
        }
        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .message-box {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .message-box textarea {
            width: 100%;
            height: 100px;
            resize: none;
        }
        .btn-clean {
            background-color: #dc3545;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-clean:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar col-md-3">
        <div class="profile-info">
            <img src="assets/img/person2.png" alt="Profile Picture">
        </div>
        <a href="http://localhost/daviplata/VistaClientes" class="menu-item">Regresar</a>
        <a href="#" class="menu-item">Mis Tickets <span class="badge bg-primary"></span></a>
    </div>

    
    <div class="content col-md-9">
        <h2 class="mb-4">Mis Tickets</h2>
        
        <!-- Tabla de Tickets -->
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Subida</th>
                        <th>Queja</th>
                        <th>Prioridad</th>
                        <th>Status</th>
                        <th>solucion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="message-box mt-4">
            <h5>Crear Tickets</h5>
            <textarea id="ticketMessage" placeholder="Escribe tu mensaje aquí..."></textarea>
            <div class="mt-2">
                <button class="btn btn-primary" onclick="registrarTicket()">Enviar Tickets</button>
                <button class="btn btn-clean" onclick="clearMessage()"><i class="fas fa-trash-alt"></i> Limpiar</button>
            </div>
        </div>
    </div>
</div>
