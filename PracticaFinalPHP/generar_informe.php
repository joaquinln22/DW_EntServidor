<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Informe de rendimiento</title>
    <link rel="icon" href="./images/burguer.png" type="image/png">
    <style>
        h1 {
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
        table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col text-center mt-3">
            <h1>Informe de rendimiento diario</h1>

            <?php
            // Conexión a la base de datos
            include("./conexion.php");

            // Consulta para obtener los datos requeridos
            $consulta = "
                SELECT 
                    DATE(p.creacion_pedido) AS fecha,
                    SUM(p.total) AS ingresos,
                    COUNT(p.id) AS num_pedidos,
                    SUM(m.comensales) AS num_comensales
                FROM pedidos p
                INNER JOIN mesas m ON p.mesa_id = m.id
                GROUP BY DATE(p.creacion_pedido)
                ORDER BY fecha DESC;
            ";

            $resultado = mysqli_query($conn, $consulta);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
                echo '<table class="table table-bordered text-center">';
                echo '<thead class="table-dark">';
                echo '<tr>';
                echo '<th>Fecha</th>';
                echo '<th>Ingresos (&euro;)</th>';
                echo '<th>Nº de pedidos</th>';
                echo '<th>Nº de comensales</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                // Iteramos sobre los resultados y rellenamos la tabla
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo '<tr>';
                    echo '<td>' . $row['fecha'] . '</td>';
                    echo '<td>' . number_format($row['ingresos'], 2) . ' €</td>';
                    echo '<td>' . $row['num_pedidos'] . '</td>';
                    echo '<td>' . $row['num_comensales'] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p class="text-danger">No hay datos disponibles para mostrar.</p>';
            }

            // Cerramos la conexión
            mysqli_close($conn);
            ?>

            <p class="volver"><a href="opciones_encargado.php" target="_parent">Volver atrás</a></p>
        </div>
    </div>
</div>
</body>
</html>
