<?php
session_start(); // Iniciar la sesión
include('Conexion.php'); // Conectar a la base de datos

// Agregar pedido a la mesa
$query = "INSERT INTO pedidos (mesa_id, camarero_id, estado)
            VALUES ()";
$result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);

        // Verificar si hay un pedido activo
        if (isset($_SESSION['pedido_id'])) {
            $pedido_id = intval($_SESSION['pedido_id']); // ID del pedido activo

            // Verificar si el producto ya está en el pedido
            $check_query = "SELECT * FROM producto_pedido WHERE pedido_id = $pedido_id AND producto_id = $producto_id";
            $check_result = mysqli_query($conn, $check_query);

            if ($check_result && mysqli_num_rows($check_result) > 0) {
                // Si el producto ya está en el pedido, incrementar la cantidad
                $update_query = "UPDATE producto_pedido 
                                 SET cantidad = cantidad + 1 
                                 WHERE pedido_id = $pedido_id AND producto_id = $producto_id";
                if (mysqli_query($conn, $update_query)) {
                    echo "Cantidad actualizada correctamente.";
                } else {
                    echo "Error al actualizar la cantidad: " . mysqli_error($conn);
                }
            } else {
                // Si no está en el pedido, agregarlo
                $insert_query = "INSERT INTO producto_pedido (pedido_id, producto_id, cantidad, notas, estado) 
                                 VALUES ($pedido_id, $producto_id, 1, '', 'pendiente')";
                if (mysqli_query($conn, $insert_query)) {
                    echo "Producto agregado al pedido correctamente.";
                } else {
                    echo "Error al agregar el producto al pedido: " . mysqli_error($conn);
                }
            }
        } else {
            echo "No hay un pedido activo para agregar este producto.";
        }
    } else {
        echo "Producto no válido o no disponible.";
    }

mysqli_close($conn); // Cerrar conexión
?>
