<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tickets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
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
        .profile-info h3 {
            font-size: 1.2em;
            margin: 10px 0;
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
    </style>
</head>
<body>

<div class="d-flex">
    
    <div class="sidebar col-md-3">
        <div class="profile-info">
            <img src="https://via.placeholder.com/80" alt="Profile Picture">
        </div>
        <a href="#" class="menu-item">Profile</a>
        <a href="#" class="menu-item">Addresses</a>
        <a href="#" class="menu-item">Wishlist</a>
        <a href="#" class="menu-item active">My Tickets <span class="badge bg-primary"></span></a>
    </div>

    <!-- Main Content -->
    <div class="content col-md-9">
        <h2 class="mb-4">My Tickets</h2>
        
        <!-- Tabla de Tickets -->
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date Submitted</th>
                        <th>Last Updated</th>
                        <th>Type</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

        <!-- Message Box -->
        <div class="message-box mt-4">
            <h5>Leave Message</h5>
            <textarea placeholder="Write your message here..."></textarea>
            <button class="btn btn-primary mt-2">Enviar Tickets</button>
        </div>
    </div>
</div>

