<?php
// Incluye el archivo de conexión
include('conexion.php');

// Verifica si se enviaron los datos del formulario
if (isset($_POST['num_mesa']) && isset($_POST['num_comen'])) {
    // Recoge los datos del formulario
    $num_mesa = intval($_POST['num_mesa']);
    $num_comen = intval($_POST['num_comen']);

    // Comprueba que los valores sean positivos
    if ($num_mesa > 0 && $num_comen > 0) {
        // Prepara la consulta SQL para actualizar la mesa
        $query = "UPDATE mesas 
                  SET estado = 'ocupada', comensales = $num_comen 
                  WHERE id = $num_mesa";

        // Ejecuta la consulta
        $result = mysqli_query($conn, $query);

        // Verifica si la actualización fue exitosa
        if ($result) {
            echo '<script>
                    alert("La mesa ha sido actualizada correctamente.");
                    window.location.href = "mesas.php";
                  </script>';
        } else {
            echo '<script>
                    alert("Error al actualizar la mesa. Inténtalo de nuevo.");
                    window.history.back();
                  </script>';
        }
    } else {
        echo '<script>
                alert("Por favor, introduce valores válidos para la mesa y los comensales.");
                window.history.back();
              </script>';
    }
} else {
    echo '<script>
            alert("Error: Datos incompletos.");
            window.history.back();
          </script>';
}

// Cierra la conexión
mysqli_close($conn);
?>
