<?php
include('conexion.php'); // Archivo de conexión a la base de datos
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mesa_id = intval($_POST['mesa_id']);

    if ($mesa_id > 0) {
        // Actualizar el estado de los pedidos asociados a la mesa
        $queryPedidos = "UPDATE pedidos SET estado = 'pagado' WHERE mesa_id = $mesa_id AND estado != 'pagado'";
        $resultPedidos = mysqli_query($conn, $queryPedidos);

        if ($resultPedidos) {
            // Actualizar el estado de la mesa a 'pagada'
            $queryMesa = "UPDATE mesas SET estado = 'pagada' WHERE id = $mesa_id";
            $resultMesa = mysqli_query($conn, $queryMesa);

            if ($resultMesa) {
                $_SESSION['mensaje'] = "Todos los pedidos de la mesa $mesa_id han sido pagados y la mesa ha sido marcada como pagada.";
            } else {
                $_SESSION['error'] = "Error al actualizar el estado de la mesa: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['error'] = "Error al pagar los pedidos: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "ID de mesa no válido.";
    }

    header("Location: pedir.php?mesa=$mesa_id");
    exit();
}
?>
