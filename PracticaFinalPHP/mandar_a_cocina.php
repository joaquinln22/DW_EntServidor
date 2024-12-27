<?php
include('conexion.php');
session_start();

// Verifica si se enviaron los datos
if (!isset($_POST['mesa_id'], $_POST['total'], $_SESSION['camarero_id'])) {
    echo '<script>
            alert("Error: Datos incompletos o sesión no válida.");
            window.history.back();
        </script>';
    exit;
}

$mesa_id = intval($_POST['mesa_id']);
$total = floatval($_POST['total']);
$camarero_id = intval($_SESSION['camarero_id']); // ID del camarero que inició sesión

// Inicia una transacción para garantizar la consistencia
mysqli_begin_transaction($conn);

try {
    // 1. Actualiza el estado de los productos a "en cocina"
    $updateQuery = "UPDATE producto_pedido 
                    SET estado = 'en cocina' 
                    WHERE mesa_id = $mesa_id AND estado = 'pendiente'";
    if (!mysqli_query($conn, $updateQuery)) {
        throw new Exception("Error en updateQuery: " . mysqli_error($conn));
    }

    // 2. Inserta el pedido en la tabla pedidos
    $insertQuery = "INSERT INTO pedidos (mesa_id, camarero_id, total, estado)
                    VALUES ($mesa_id, $camarero_id, $total, 'pendiente')";
    if (!mysqli_query($conn, $insertQuery)) {
        throw new Exception("Error en insertQuery: " . mysqli_error($conn));
    }

    // Confirma la transacción
    mysqli_commit($conn);

    echo '<script>
            alert("Pedido enviado a cocina correctamente.");
            window.location.href = "mesas.php";
            </script>';
} catch (Exception $e) {
    // Si algo falla, revierte la transacción
    mysqli_rollback($conn);
    echo '<script>
            alert("Error al enviar el pedido: ' . addslashes($e->getMessage()) . '");
            window.history.back();
          </script>';
}

mysqli_close($conn);
?>
