<?php
include('conexion.php'); // Archivo de conexión a la base de datos
include("seguridad_camarero.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$mesa_id = isset($_POST['mesa']) ? intval($_POST['mesa']) : (isset($_GET['mesa']) ? intval($_GET['mesa']) : 0); // ID de la mesa seleccionada

if ($mesa_id <= 0) {
    die("Error: ID de mesa no válido.");
}

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
    <style>
        .boton1{
            background-color: #8442f5;
            border-color: transparent;
        }
        .boton1:hover{
            background-color: #8442f5;
            border-color: transparent;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="text-center" >
            <p><a style="color: #8442f5; text-decoration: none" href="mesas.php">Volver atrás</a></p>
        </div>
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
                                <button class="boton1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal' . $row['id'] . '">Añadir</button>
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
                                    <button type="submit" class="boton1 btn btn-success">Agregar</button>
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
                            <form action="quitar_producto.php" method="POST" class="mb-0">
                                <input type="hidden" name="producto_pedido_id" value="' . $row['id'] . '">
                                <input type="hidden" name="mesa_id" value="' . $mesa_id . '">
                                <button type="submit" class="btn btn-sm btn-danger">Quitar</button>
                            </form>
                            <span>' . $row['nombre'] . ' x' . $row['cantidad'] . '</span>
                            <span>€' . number_format($subtotal, 2) . '</span>
                        </li>';
                }
                echo '</ul>';
            } else {
                echo "<p>No hay productos pendientes.</p>";
            }
            ?>
            <div class="mt-3">
                <span class="fs-5 fw-bold">Total: €<?php echo number_format($total ?? 0, 2); ?></span>
            </div>
            <!-- Botón para Mandar a Cocina -->
            <form action="mandar_a_cocina.php" method="POST" class="mt-3">
                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                <input type="hidden" name="total" value="<?php echo $total ?? 0; ?>">
                <button type="submit" class="boton1 btn btn-success w-100">Mandar a Cocina</button>
            </form>

            <!-- Listado de pedidos asociados a la mesa -->
            <div class="mt-5">
                <h4>Pedidos pendientes de pago</h4>
                <?php
                $queryPedidosMesa = "SELECT id, total, estado, creacion_pedido 
                                    FROM pedidos 
                                    WHERE mesa_id = $mesa_id AND estado!='pagado'
                                    ORDER BY creacion_pedido DESC";
                $resultPedidosMesa = mysqli_query($conn, $queryPedidosMesa);

                if ($resultPedidosMesa && mysqli_num_rows($resultPedidosMesa) > 0) {
                    echo '<ul class="list-group">';
                    while ($pedido = mysqli_fetch_assoc($resultPedidosMesa)) {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Pedido ID:</strong> ' . $pedido['id'] . '<br>
                                    <strong>Total:</strong> €' . number_format($pedido['total'], 2) . '<br>
                                    <strong>Estado:</strong> ' . ucfirst($pedido['estado']) . '<br>
                                    <strong>Fecha:</strong> ' . $pedido['creacion_pedido'] . '
                                </div>
                            </li>';
                    }
                    echo '</ul>';
                    echo '<form action="pagar_pedido.php" method="POST" class="mt-4">
                            <input type="hidden" name="mesa_id" value="' . $mesa_id . '">
                            <button type="submit" class="btn btn-lg btn-success w-100">Pagar Todos</button>
                        </form>';
                } else {
                    echo "<p>No hay pedidos registrados para esta mesa.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>