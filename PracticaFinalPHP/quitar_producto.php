<?php
include('conexion.php'); // Archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_pedido_id = intval($_POST['producto_pedido_id']);
    $mesa_id = intval($_POST['mesa_id']); // Asegúrate de recibir la mesa ID desde el formulario

    // Eliminar el producto pendiente
    $query = "DELETE FROM producto_pedido WHERE id = $producto_pedido_id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // Redirigir al listado de productos pendientes con el ID de la mesa
        header("Location: pedir.php?mesa=$mesa_id");
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }
}
?>
