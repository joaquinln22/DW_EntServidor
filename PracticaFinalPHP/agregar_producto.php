<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('conexion.php'); // Archivo de conexión a la base de datos

// Verifica si se enviaron los datos del formulario
if (isset($_POST['producto_id'], $_POST['mesa_id'], $_POST['cantidad'])) {
    $producto_id = intval($_POST['producto_id']);
    $mesa_id = intval($_POST['mesa_id']);
    $cantidad = intval($_POST['cantidad']);
    $notas = isset($_POST['notas']) ? mysqli_real_escape_string($conn, $_POST['notas']) : '';

    // Validar mesa_id
    if (isset($_POST['mesa_id']) && intval($_POST['mesa_id']) > 0) {
        $mesa_id = intval($_POST['mesa_id']);
    } else {
        echo '<script>
                window.location.href = "pedir.php";
              </script>';
        exit();
    }

    // Verifica que la cantidad sea válida
    if ($cantidad > 0) {
        // Inicia una transacción para asegurar la consistencia
        mysqli_begin_transaction($conn);

        try {
            // Inserta el producto en la tabla producto_pedido
            $query = "INSERT INTO producto_pedido (producto_id, mesa_id, cantidad, notas, estado)
                      VALUES ($producto_id, $mesa_id, $cantidad, '$notas', 'pendiente')";
            
            if (mysqli_query($conn, $query)) {
                // Actualiza el stock del producto en la tabla productos
                $update_stock_query = "UPDATE productos 
                                       SET stock = stock - $cantidad 
                                       WHERE id = $producto_id AND stock >= $cantidad";
                
                if (mysqli_query($conn, $update_stock_query)) {
                    // Confirma la transacción si todo fue exitoso
                    mysqli_commit($conn);
                    echo '<script>
                            alert("Producto agregado correctamente y stock actualizado.");
                            window.location.href = "pedir.php?mesa=' . $mesa_id . '";
                          </script>';
                } else {
                    // Revertir la transacción en caso de error
                    mysqli_rollback($conn);
                    echo '<script>
                            alert("Error al actualizar el stock: ' . mysqli_error($conn) . '");
                            window.location.href = "pedir.php?mesa=' . $mesa_id . '";
                          </script>';
                }
            } else {
                // Revertir la transacción en caso de error
                mysqli_rollback($conn);
                echo '<script>
                        alert("Error al agregar el producto: ' . mysqli_error($conn) . '");
                        window.location.href = "pedir.php?mesa=' . $mesa_id . '";
                      </script>';
            }
        } catch (Exception $e) {
            // Revertir la transacción en caso de excepción
            mysqli_rollback($conn);
            echo '<script>
                    alert("Error inesperado: ' . $e->getMessage() . '");
                    window.location.href = "pedir.php?mesa=' . $mesa_id . '";
                  </script>';
        }
    } else {
        echo '<script>
                alert("La cantidad debe ser mayor a 0.");
                window.location.href = "pedir.php?mesa=' . $mesa_id . '";
              </script>';
    }
} else {
    echo '<script>
            alert("Error: Datos incompletos.");
            window.location.href = "pedir.php?mesa=' . $mesa_id . '";
          </script>';
}

mysqli_close($conn);
?>
