<?php
// editar_producto.php
session_start();
include('Conexion.php');
include('security.php');
verificarRol('encargado'); // Solo los encargados pueden acceder

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idProducto'])) {
    $idProducto = (int)$_POST['idProducto'];

    // Consultar los datos del producto seleccionado
    $consultaProducto = "SELECT * FROM productos WHERE idProducto = $idProducto";
    $resultadoProducto = mysqli_query($conex, $consultaProducto);
    $producto = mysqli_fetch_assoc($resultadoProducto);

    if (!$producto) {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "Acceso no válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST" action="gestion_productos.php">
        <input type="hidden" name="idProducto" value="<?php echo $producto['idProducto']; ?>">
        
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>

        <label>Descripción:</label>
        <textarea name="descripcion"><?php echo $producto['descripcion']; ?></textarea><br>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required><br>

        <label>Categoría:</label>
        <select name="categoria" required>
            <option value="entrante" <?php echo $producto['categoria'] === 'entrante' ? 'selected' : ''; ?>>Entrante</option>
            <option value="principal" <?php echo $producto['categoria'] === 'principal' ? 'selected' : ''; ?>>Principal</option>
            <option value="postre" <?php echo $producto['categoria'] === 'postre' ? 'selected' : ''; ?>>Postre</option>
            <option value="bebida" <?php echo $producto['categoria'] === 'bebida' ? 'selected' : ''; ?>>Bebida</option>
        </select><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required><br>

        <button type="submit" name="modificar_producto">Guardar Cambios</button>
    </form>
    <a href="gestion_productos.php">Cancelar</a>
</body>
</html>