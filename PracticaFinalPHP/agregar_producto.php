<?php
include('conexion.php'); // Archivo de conexión a la base de datos

// Verifica si se enviaron los datos del formulario
if (isset($_POST['producto_id'], $_POST['mesa_id'], $_POST['cantidad'])) {
    $producto_id = intval($_POST['producto_id']);
    $mesa_id = intval($_POST['mesa_id']);
    $cantidad = intval($_POST['cantidad']);
    $notas = isset($_POST['notas']) ? mysqli_real_escape_string($conn, $_POST['notas']) : '';

    // Verifica que la cantidad sea válida
    if ($cantidad > 0) {
        // Inserta el producto en la tabla producto_pedido
        $query = "INSERT INTO producto_pedido (producto_id, mesa_id, cantidad, notas, estado)
                  VALUES ($producto_id, $mesa_id, $cantidad, '$notas', 'pendiente')";
        
        if (mysqli_query($conn, $query)) {
            echo '<script>
                    alert("Producto agregado correctamente.");
                    window.history.back();
                  </script>';
        } else {
            echo "Error al agregar el producto: " . mysqli_error($conn);
        }
    } else {
        echo '<script>
                alert("La cantidad debe ser mayor a 0.");
                window.history.back();
              </script>';
    }
} else {
    echo '<script>
            alert("Error: Datos incompletos.");
            window.history.back();
          </script>';
}

mysqli_close($conn);
?>
