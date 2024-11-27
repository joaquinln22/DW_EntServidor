<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.bundle.min.js"></script>
    <title></title>
    <style>
        .caja{
            width: 450px;
            font-size: 1.2em;
        }
        .caja2{
            width: 900px;
        }
        .boton1:hover{
            background-color: #8442f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="caja col-auto">
                <form action="consulta_mesas.php" method="post" name="inicio_sesion">
                    <div class="row text-center">
                        <div class="col-12">
                            <h1>Añadir comensales a mesa</h1>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-between">
                        <div class="col-auto">
                            <p>Nº mesa:</p>
                        </div>
                        <div class="col-auto">
                            <input type="number" name="num_mesa" size="20" required>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-between">
                        <div class="col-auto">
                            <p>Nº comensales:</p>
                        </div>
                        <div class="col-auto">
                            <input type="number" name="num_comen" size="20" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col d-grid">
                            <input class="boton1 btn btn-danger" type="submit" value="Crear">
                        </div>
                    </div>
                </form>
            </div>
            <div class="caja2 col-auto">
                <?php
                    include('Conexion.php');

                    // Consulta para obtener el número de las mesas registradas en la base de datos
                    $query = "SELECT * FROM mesas";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        echo '  <!DOCTYPE html>
                                <html lang="es">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <style>
                                        body {
                                            font-family: Arial, sans-serif;
                                            background-color: #f4f4f4;
                                            color: #333;
                                            margin: 0;
                                            padding: 0;
                                        }

                                        h1 {
                                            text-align: center;
                                            color: #0078d7;
                                            margin-top: 20px;
                                            font-size: 2.5em;
                                        }

                                        .mesas-container {
                                            display: flex;
                                            flex-wrap: wrap;
                                            justify-content: center;
                                            gap: 20px;
                                            margin: 20px auto;
                                            max-width: 800px;
                                        }

                                        .mesa-card {
                                            background-color: #fff;
                                            border-radius: 8px;
                                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                                            text-align: center;
                                            width: 180px;
                                            padding: 10px;
                                            transition: transform 0.3s ease, box-shadow 0.3s ease;
                                        }

                                        .mesa-card:hover {
                                            transform: translateY(-5px);
                                            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
                                        }

                                        .mesa-card img {
                                            width: 100%;
                                            height: auto;
                                            border-radius: 8px;
                                        }

                                        .mesa-card button {
                                            background: none;
                                            border: none;
                                            padding: 0;
                                            cursor: pointer;
                                            width: 100%;
                                        }

                                        .volver {
                                            text-align: center;
                                            margin-top: 30px;
                                        }

                                        .volver a {
                                            text-decoration: none;
                                            color: red;
                                            font-size: 1.2em;
                                            transition: color 0.3s ease;
                                        }

                                        .volver a:hover {
                                            color: #8442f5;
                                        }
                                    </style>
                                </head>
                                <body>

                                <h1>Selecciona una Mesa</h1>
                                <div class="mesas-container">';
                        
                                // Iterar sobre las mesas obtenidas de la base de datos
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $numeroMesa = $row['id'];
                                    $condition=$row['estado'];

                                    // Definir el color basado en el estado
                                    $color = '';
                                    if ($condition == 'abierta') {
                                        $color = 'green';
                                    } elseif ($condition == 'ocupada') {
                                        $color = 'red';
                                    } elseif ($condition == 'pagada') {
                                        $color = 'purple';
                                    }

                                    if ($condition == 'abierta'){
                                        echo '
                                        <div class="mesa-card">
                                            <h2>Mesa ' . $numeroMesa . '</h2> 
                                            <form action="consulta_pedido.php" method="POST">
                                                <input type="hidden" name="mesa" value="' . $numeroMesa . '">
                                                <button type="submit" href="pedidos.php">
                                                    <img src="images/mesa.png" alt="Mesa ' . $numeroMesa . '">
                                                </button>
                                            </form>
                                            <h4 style="color: ' . $color . ';">' . $condition . '</h4>
                                        </div>
                                        ';
                                    }else{
                                        echo '
                                        <div class="mesa-card">
                                            <h2>Mesa ' . $numeroMesa . '</h2> 
                                            <form action="pedidos.php" method="POST">
                                                <input type="hidden" name="mesa" value="' . $numeroMesa . '">
                                                <button type="submit">
                                                    <img src="images/mesa.png" alt="Mesa ' . $numeroMesa . '">
                                                </button>
                                            </form>
                                            <h4 style="color: ' . $color . ';">' . $condition . '</h4>
                                        </div>
                                        ';  
                                    }
                                    
                                }

                        echo '  </div>
                                <div class="volver">
                                    <p><a href="opciones_camarero.php">Volver atrás</a></p>
                                </div>
                                </body>
                                </html>';
                    } else {
                        echo '<p>No hay mesas registradas en la base de datos.</p>';
                    }

                    // Cerrar conexión
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>