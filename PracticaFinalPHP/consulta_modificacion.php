<?php
    include("conexion.php");

    // Recoges datos de formulario
    $usuario_modificar = $_POST['usuario_modificar'];
    $user = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $dni = $_POST['dni'];
    $foto = $_POST['foto'];
    $contra = $_POST['contraseña'];
    $rol = $_POST['rol'];

    // Consulta para verificar si el usuario existe
    $consulta = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario_modificar'";
    $result = mysqli_query($conn, $consulta);

    // Comprobamos si existe y hay resultados
    if ($result && mysqli_num_rows($result) > 0) {
        // Si existe, actualizamos los datos
        $consulta2 = "UPDATE usuarios SET nombre_usuario='$user', nombre='$nombre', apellidos='$apellidos', edad='$edad', dni='$dni', foto='$foto', contraseña='$contra', rol='$rol' WHERE nombre_usuario='$usuario_modificar'";
        mysqli_query($conn, $consulta2);
        echo '<script>
                alert("Usuario actualizado correctamente.");
                window.location.href = "modificacion_usuarios.php";
              </script>';
    } else {
        // Si no existe, mostramos un alert
        echo '<script>
                alert("Usuario no encontrado.");
                window.location.href = "modificacion_usuarios.php";
              </script>';
    }

    // Cerramos la conexión
    mysqli_close($conn);
?>
