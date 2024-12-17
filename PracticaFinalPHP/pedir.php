<?php
include('conexion.php'); // Archivo de conexión a la base de datos
session_start();

$mesa_id = intval($_POST['mesa']); // ID de la mesa seleccionada

// 1. Consulta para obtener los productos agrupados por categoría
$query = "SELECT * FROM productos ORDER BY categoria ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Mesa <?php echo $mesa_id; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Columna Izquierda: Menú de Productos -->
        <div class="col-md-6">
            <h2 class="text-center">Menú</h2>
            <?php 
            $currentCategory = "";
            while ($row = mysqli_fetch_assoc($result)) {
                if ($currentCategory != $row['categoria']) {
                    $currentCategory = $row['categoria'];
                    echo "<h3>" . ucfirst($currentCategory) . "</h3>";
                }
                echo '
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="'. $row['imagen'] . '" class="img-fluid rounded-start" alt="' . $row['nombre'] . '">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['nombre'] . '</h5>
                                <p class="card-text">' . $row['descripcion'] . '</p>
                                <p class="card-text"><small class="text-muted">Precio: €' . $row['precio'] . ' | Stock: ' . $row['stock'] . '</small></p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal' . $row['id'] . '">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para añadir producto -->
                <div class="modal fade" id="modal' . $row['id'] . '" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Añadir ' . $row['nombre'] . ' para Mesa '. $mesa_id .'</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="agregar_producto.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="producto_id" value="' . $row['id'] . '">
                                    <input type="hidden" name="mesa_id" value="' . $mesa_id . '">
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="number" name="cantidad" min="1" max="' . $row['stock'] . '" required class="form-control">
                                    <label for="notas" class="mt-2">Notas:</label>
                                    <textarea name="notas" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>

        <!-- Columna Derecha: Listado de Productos Pendientes -->
        <div class="col-md-6">
            <h2 class="text-center mb-5">Pendiente</h2>
            <?php
            // NUEVA CONSULTA para mostrar productos pendientes
            $queryPendientes = "SELECT pp.id, p.nombre, pp.cantidad, p.precio 
                                FROM producto_pedido pp
                                JOIN productos p ON pp.producto_id = p.id
                                WHERE pp.mesa_id = $mesa_id AND pp.estado = 'pendiente'";
            $resultPendientes = mysqli_query($conn, $queryPendientes);

            if ($resultPendientes && mysqli_num_rows($resultPendientes) > 0) {
                $total = 0;
                echo '<ul class="list-group">';
                while ($row = mysqli_fetch_assoc($resultPendientes)) {
                    $subtotal = $row['cantidad'] * $row['precio'];
                    $total += $subtotal;
                    echo '<li class="list-group-item d-flex justify-content-between">
                            <span>' . $row['nombre'] . ' x' . $row['cantidad'] . '</span>
                            <span>€' . number_format($subtotal, 2) . '</span>
                        </li>';
                }
                echo '</ul>';
            } else {
                echo "<p>No hay productos pendientes.</p>";
            }
            ?>

            <!-- Botón para Mandar a Cocina -->
            <form action="mandar_a_cocina.php" method="POST" class="mt-3">
                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                <input type="hidden" name="total" value="<?php echo $total ?? 0; ?>">
                <button type="submit" class="btn btn-danger w-100">Mandar a Cocina</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
