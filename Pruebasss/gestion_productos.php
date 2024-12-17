<?php
// gestion_productos.php
session_start();
include('Conexion.php');
include('security.php');
verificarRol('encargado'); // Solo los encargados pueden acceder

// Agregar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar_producto'])) {
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conex, $_POST['descripcion']);
    $precio = (float)$_POST['precio'];
    $categoria = mysqli_real_escape_string($conex, $_POST['categoria']);
    $stock = (int)$_POST['stock'];

    $consulta = "INSERT INTO productos (nombre, descripcion, precio, categoria, stock) 
                 VALUES ('$nombre', '$descripcion', '$precio', '$categoria', '$stock')";

    if (mysqli_query($conex, $consulta)) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error al agregar producto: " . mysqli_error($conex);
    }
}

// Modificar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modificar_producto'])) {
    $idProducto = (int)$_POST['idProducto'];
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conex, $_POST['descripcion']);
    $precio = (float)$_POST['precio'];
    $categoria = mysqli_real_escape_string($conex, $_POST['categoria']);
    $stock = (int)$_POST['stock'];

    $consulta = "UPDATE productos 
                 SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', 
                     categoria = '$categoria', stock = '$stock' 
                 WHERE idProducto = $idProducto";

    if (mysqli_query($conex, $consulta)) {
        echo "Producto modificado exitosamente.";
    } else {
        echo "Error al modificar producto: " . mysqli_error($conex);
    }
}

// Eliminar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_producto'])) {
    $idProducto = (int)$_POST['idProducto'];

    $consulta = "DELETE FROM productos WHERE idProducto = $idProducto";

    if (mysqli_query($conex, $consulta)) {
        echo "Producto eliminado exitosamente.";
    } else {
        echo "Error al eliminar producto: " . mysqli_error($conex);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
</head>
<body>
    <h1>Gestión de Productos</h1>

    <!-- Formulario para agregar producto -->
    <h2>Agregar Producto</h2>
    <form method="POST" action="gestion_productos.php">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <input type="number" name="precio" step="0.01" placeholder="Precio" required>
        <select name="categoria" required>
            <option value="entrante">Entrante</option>
            <option value="principal">Principal</option>
            <option value="postre">Postre</option>
            <option value="bebida">Bebida</option>
        </select>
        <input type="number" name="stock" placeholder="Stock inicial" required>
        <button type="submit" name="agregar_producto">Agregar Producto</button>
    </form>

    <!-- Listado de productos -->
    <h2>Lista de Productos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $consultaProductos = "SELECT * FROM productos";
    $resultadoProductos = mysqli_query($conex, $consultaProductos);

    while ($producto = mysqli_fetch_assoc($resultadoProductos)) {
        echo "<tr>";
        echo "<td>" . $producto['idProducto'] . "</td>";
        echo "<td>" . $producto['nombre'] . "</td>";
        echo "<td>" . $producto['descripcion'] . "</td>";
        echo "<td>" . $producto['precio'] . "</td>";
        echo "<td>" . $producto['categoria'] . "</td>";
        echo "<td>" . $producto['stock'] . "</td>";
        echo "<td>
                <!-- Formulario para modificar producto -->
                <form method='POST' action='editar_producto.php' style='display:inline;'>
                    <input type='hidden' name='idProducto' value='" . $producto['idProducto'] . "'>
                    <button type='submit'>Modificar</button>
                </form>
                <!-- Formulario para eliminar producto -->
                <form method='POST' action='gestion_productos.php' style='display:inline;'>
                    <input type='hidden' name='idProducto' value='" . $producto['idProducto'] . "'>
                    <button type='submit' name='eliminar_producto'>Eliminar</button>
                </form>
              </td>";
        echo "</tr>";
    }
    ?>
</tbody>
    </table>
</body>
</html>
