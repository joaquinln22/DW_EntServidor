<?php
include('conexion.php'); // Archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_pedido_id = intval($_POST['producto_pedido_id']);
    $mesa_id = intval($_POST['mesa_id']); // Asegúrate de recibir la mesa ID desde el formulario

    // Obtener la información del producto antes de eliminarlo
    $query_select = "SELECT producto_id, cantidad FROM producto_pedido WHERE id = $producto_pedido_id";
    $result_select = mysqli_query($conn, $query_select);

    if ($result_select && mysqli_num_rows($result_select) > 0) {
        $row = mysqli_fetch_assoc($result_select);
        $producto_id = intval($row['producto_id']);
        $cantidad = intval($row['cantidad']);

        // Iniciar una transacción para asegurar consistencia
        mysqli_begin_transaction($conn);

        try {
            // Eliminar el producto de la tabla producto_pedido
            $query_delete = "DELETE FROM producto_pedido WHERE id = $producto_pedido_id";
            if (mysqli_query($conn, $query_delete)) {
                // Sumar la cantidad eliminada al stock del producto
                $query_update_stock = "UPDATE productos SET stock = stock + $cantidad WHERE id = $producto_id";
                if (mysqli_query($conn, $query_update_stock)) {
                    // Confirmar la transacción
                    mysqli_commit($conn);
                    // Redirigir al listado de productos pendientes con el ID de la mesa
                    header("Location: pedir.php?mesa=$mesa_id");
                    exit();
                } else {
                    // Revertir la transacción en caso de error
                    mysqli_rollback($conn);
                    echo "Error al actualizar el stock: " . mysqli_error($conn);
                }
            } else {
                // Revertir la transacción en caso de error
                mysqli_rollback($conn);
                echo "Error al eliminar el producto: " . mysqli_error($conn);
            }
        } catch (Exception $e) {
            // Revertir la transacción en caso de excepción
            mysqli_rollback($conn);
            echo "Error inesperado: " . $e->getMessage();
        }
    } else {
        echo "Producto no encontrado o ya eliminado.";
    }
}
?>

