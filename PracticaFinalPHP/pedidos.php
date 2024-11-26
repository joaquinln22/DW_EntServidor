<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.bundle.min.js"></script>
    <title></title>
</head>
<body>
    <?php
        include('Conexion.php');

        // Consulta para obtener el menú en la base de datos
        $query = "SELECT * FROM productos";
        $result = mysqli_query($conn, $query);

        // Cerrar conexión
        mysqli_close($conn);
    ?>
</body>
</html>