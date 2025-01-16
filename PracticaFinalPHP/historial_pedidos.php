<?php
include('conexion.php'); // Archivo de conexión a la base de datos
include("seguridad_encargado.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Historial de pedidos</title>
    <link rel="icon" href="./images/burguer.png" type="image/png">
    <style>
        h1{
           text-align: center;
           margin-top: 50px;
           margin-bottom: 20px;
           color: #0078d7;
        }
        .volver a {
            text-decoration: none;
            color: red;
            font-size: 1.2em;
            transition: color 0.3s ease;
            text-align: center;
        }

        .volver a:hover {
            color: #8442f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Historial de pedidos</h1>
                <?php
                $queryPedidos = "SELECT id, mesa_id, camarero_id, total, estado, creacion_pedido 
                                    FROM pedidos
                                    ORDER BY creacion_pedido DESC";
                $resultPedidos = mysqli_query($conn, $queryPedidos);

                if ($resultPedidos && mysqli_num_rows($resultPedidos) > 0) {
                    echo '<ul class="list-group">';
                    while ($pedido = mysqli_fetch_assoc($resultPedidos)) {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Pedido ID: </strong> ' . $pedido['id'] . '<br>
                                    <strong>Mesa: </strong>' . $pedido['mesa_id'] . '<br>
                                    <strong>Camarero: </strong>' . $pedido['camarero_id'] . '<br>
                                    <strong>Total: </strong>€' . number_format($pedido['total'], 2) . '<br>
                                    <strong>Estado: </strong>' . ucfirst($pedido['estado']) . '<br>
                                    <strong>Fecha: </strong>' . $pedido['creacion_pedido'] . '
                                </div>
                            </li>';
                    }
                    echo '</ul>';
                } else {
                    echo "<p>No hay pedidos registrados.</p>";
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col text-center mt-3">
            <p class="volver"><a href="opciones_encargado.php" target="_parent">Volver atrás</a></p>
            </div>
        </div>
    </div>
</body>
</html>