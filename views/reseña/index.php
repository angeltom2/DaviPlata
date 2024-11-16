<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas - Servicios Financieros</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        main {
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            border-right: 1px solid #ddd;
        }

        .sidebar h2 {
            text-align: center;
            color: #0d6efd;
            padding: 1rem 0;
            border-bottom: 1px solid #ddd;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            font-size: 1rem;
        }

        .sidebar ul li:hover {
            background-color: #0d6efd;
        }

        .sidebar ul li:hover a {
            color: #fff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            background-color: #ffffff;
            padding: 15px 20px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 1.5rem;
            color: #333;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container textarea,
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #0d6efd;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0b5ed7;
        }

        .stars {
            display: flex;
            gap: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .stars span {
            font-size: 2rem;
            color: #ddd;
        }

        .stars span.active {
            color: #ffc107;
        }

        .rating-description {
            font-size: 1rem;
            font-weight: bold;
            color: #555;
            margin-bottom: 10px;
        }
        .dni-container {
             margin-top: 10px;
        }

        .dni-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .dni-container input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        footer {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 188px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Reseñas</h2>
        <ul>
            <li><a href="http://localhost/daviplata/VistaClientes">Regresar</a></li>
            <li><a href="http://localhost/daviplata/Rese%C3%B1a#">Mis Reseñas</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h1>Mis Reseñas</h1>
            
        </div>

        <div class="form-container">
            <h2>Agregar Nueva Reseña</h2>
            <textarea placeholder="Escribe tu comentario aquí..." rows="4"></textarea>

            <div class="dni-container">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" placeholder="Introduce tu DNI" required>
             </div>

            <div class="stars" id="starContainer">
                <span data-value="1">&#9733;</span>
                <span data-value="2">&#9733;</span>
                <span data-value="3">&#9733;</span>
                <span data-value="4">&#9733;</span>
                <span data-value="5">&#9733;</span>
            </div>

            <div class="rating-description" id="ratingDescription">
                Selecciona una calificación
            </div>
            <button>Enviar Reseña</button>
        </div>
    </div>
    <footer>
        © 2024 Servicios Financieros - Todos los Derechos Reservados
    </footer>

    <script>
        const stars = document.querySelectorAll('#starContainer span');
        const ratingDescription = document.getElementById('ratingDescription');

        const descriptions = {
            1: 'Deficiente',
            2: 'Regular',
            3: 'Aceptable',
            4: 'Bueno',
            5: 'Excelente',
        };

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = parseInt(star.getAttribute('data-value'));
                
                // Reset stars
                stars.forEach(s => s.classList.remove('active'));
                
                // Activate stars up to the selected one
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('active');
                }
                
                // Update description
                ratingDescription.textContent = descriptions[value];
            });
        });
    </script>
</body>

</html>

