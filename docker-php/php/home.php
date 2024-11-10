<?php
require_once 'config.php';
session_start();

// Asegurarse de que el usuario esté autenticado
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Consulta para obtener los usuarios de la base de datos
$query = "SELECT id, username FROM users";
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        /* Fondo azul pastel claro para home.php */
        body {
            background-color: #d0e7f9; /* Azul pastel claro */
            font-family: Arial, sans-serif;
        }

        /* Estilo de las tarjetas */
        .card {
            background-color: #ffffff; /* Fondo blanco */
            color: #333; /* Texto en gris oscuro */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra ligera */
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="my-4">Welcome to the User Dashboard</h2>
    
    <div class="row">
        <?php
        // Generar una tarjeta para cada usuario
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="col-sm-6 col-md-4 col-lg-3 my-3">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($row["username"]) . '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">ID: ' . htmlspecialchars($row["id"]) . '</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                ';
            }
        } else {
            echo '<p>No users found.</p>';
        }
        ?>
    </div>

    <a href="logout.php" class="btn btn-primary mt-4">Logout</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
