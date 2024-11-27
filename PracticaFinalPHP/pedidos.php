<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Menú de Productos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn-seleccionar {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-seleccionar:hover {
            background-color: #8442f5;
        }
        .volver{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto_id'])) {
            $producto_id = intval($_POST['producto_id']);
            // Procesar el producto seleccionado (por ejemplo, añadir al carrito o registrar el pedido)
            echo "Producto seleccionado con ID: " . $producto_id;
        }
    ?>
    <div class="container mt-4">
        <h1 class="text-center">Menú de Productos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio(€)</th>
                    <th>Descripción</th>
                    <th>Disponible</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('Conexion.php');

                // Consulta para obtener el menú en la base de datos
                $query = "SELECT * FROM productos";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $num = $row['id'];
                        $img = $row['imagen'];
                        $nom = $row['nombre'];
                        $categ = $row['categoria'];
                        $prec = $row['precio'];
                        $descrip = $row['descripcion'];
                        $dispo = $row['disponible'] ? "Sí" : "No";
                        echo "<tr>
                                <td><img width=100 height=100 src='$img'></td>
                                <td>{$nom}</td>
                                <td>{$categ}</td>
                                <td>{$prec}</td>
                                <td>{$descrip}</td>
                                <td>{$dispo}</td>
                                <td>
                                    <form action='consulta_pedido.php' method='POST'>
                                        <input type='hidden' name='producto_id' value='{$num}'>
                                        <button type='submit' class='btn-seleccionar'>Seleccionar</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No hay productos disponibles.</td></tr>";
                }

                echo '  </div>
                            <div class="volver">
                                <p><a href="opciones_camarero.php">Volver atrás</a></p>
                            </div>
                            </body>
                            </html>';
                
                // Cerrar conexión
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
