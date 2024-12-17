<?php
// gestionar_pedidos.php
session_start();
include('Conexion.php');
include('security.php');
verificarRol('camarero');

// Obtener el ID de la mesa seleccionada, si no hay ninguna selecionada que me salga un mensaje de error
if (!isset($_GET['idMesa'])) {
    echo "No se seleccionó ninguna mesa.";
    exit;
}
$idMesa = (int)$_GET['idMesa'];

//formulario enviado por post y que el boton sea presionado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar_productos'])) {
    $idCamarero = $_SESSION['idUsuario']; //recuperamos el id del camarero que está logueado

    // Comprobar si ya existe un pedido pendiente para esta mesa para que no se creen pedidos duplicados
    $consultaPedidoExistente = "SELECT idPedido FROM pedidos WHERE idMesa = $idMesa AND estado = 'pendiente'";
    $resultadoPedidoExistente = mysqli_query($conex, $consultaPedidoExistente);
    
    //si ya hay un pedido pendiente para esta mesa, recuperamos el id del pedido
    if ($resultadoPedidoExistente && mysqli_num_rows($resultadoPedidoExistente) > 0) {
        $pedido = mysqli_fetch_assoc($resultadoPedidoExistente);
        $idPedido = $pedido['idPedido'];
    } else {
        // sino creamos un nuevo pedido
        $consultaPedido = "INSERT INTO pedidos (idMesa, idCamarero, estado) VALUES ($idMesa, $idCamarero, 'pendiente')";
        if (mysqli_query($conex, $consultaPedido)) {
            $idPedido = mysqli_insert_id($conex);
        } else {
            echo "Error al crear el pedido: " . mysqli_error($conex);
            exit;
        }
    }

    // Recorremos los productos enviados por el form y los insertamos en detallepedidos
    foreach ($_POST['productos'] as $producto) {
        $idProducto = (int)$producto['idProducto'];
        $cantidad = (int)$producto['cantidad'];
        $nota = mysqli_real_escape_string($conex, $producto['nota']);

        $consultaDetalle = "INSERT INTO detallepedidos (idPedido, idProducto, cantidad, nota) 
                            VALUES ($idPedido, $idProducto, $cantidad, '$nota')";
        if (!mysqli_query($conex, $consultaDetalle)) {
            echo "Error al registrar el producto: " . mysqli_error($conex);
        }
    }
    echo "Productos registrados correctamente.";
}

// Cancelar producto, si el boton cancelar es presionado eliminamos el producto de la tabbla detalles pedidos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancelar_producto'])) {
    $idDetallePedido = (int)$_POST['idDetallePedido'];
    $consultaEliminarProducto = "DELETE FROM detallepedidos WHERE idDetallePedido = $idDetallePedido";
    if (mysqli_query($conex, $consultaEliminarProducto)) {
        echo "Producto cancelado correctamente.";
    } else {
        echo "Error al cancelar el producto: " . mysqli_error($conex);
    }
}

// Enviar pedido a cocina si el boton enviar a cocina es presionado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_cocina'])) {
    $idPedido = (int)$_POST['idPedido'];
    // Primero verificamos si hay productos en el pedido para que no enviemos el pedido a cocina con una consulta
    $consultaProductos = "SELECT dp.idProducto, dp.cantidad, p.stock 
                          FROM detallepedidos dp 
                          INNER JOIN productos p ON dp.idProducto = p.idProducto 
                          WHERE dp.idPedido = $idPedido";
    $resultadoProductos = mysqli_query($conex, $consultaProductos);

    // esto es para simular un error en el stock 
    $errorStock = false;
    while ($producto = mysqli_fetch_assoc($resultadoProductos)) {
        $nuevoStock = $producto['stock'] - $producto['cantidad'];
        if ($nuevoStock < 0) {
            $errorStock = true; // si despues de quitar la cantidad introducida por el form al stock de la tienda es menor que 0, el errorStock es true
            echo "No hay suficiente stock para el producto " . $producto['idProducto'];
            break; 
        }
        //por lo contrario, si si hay stock suficiente, actualizamos el stock con esta consulta
        $consultaReducirStock = "UPDATE productos SET stock = $nuevoStock WHERE idProducto = " . $producto['idProducto'];
        mysqli_query($conex, $consultaReducirStock);
    }

    // si no hay error en el stock, enviamos el pedido a cocina. Si hay error en el stock, no se envía el pedido a cocina
    if (!$errorStock) {
        $consultaActualizarPedido = "UPDATE pedidos SET estado = 'enviado' WHERE idPedido = $idPedido";
        mysqli_query($conex, $consultaActualizarPedido);
        echo "Pedido enviado a cocina correctamente.";
    }
}
?>

<!-- Formulario para registrar productos -->
<h2>Registrar Productos para Mesa <?php echo $idMesa; ?></h2>
<!-- hago el post por el id mesa para que me gestione según su id -->
<form method="POST" action="gestionar_pedidos.php?idMesa=<?php echo $idMesa; ?>">
    <h3>Productos</h3>
    <div id="productos">
        <div class="producto">
            <label>Producto:</label>
            <!-- productos[0][idproducto] si ponemos [1] en lugar de [0] y refrescamos pagina veremos como nos añade el primer producto
            de la lista sin que nosotros le demos al boton el producto que elija se asocia al idproducto que tiene-->
            <select name="productos[0][idProducto]" required>
                <?php
                //para que solo se vean los articulos con stock mayor a 0
                $consultaProductos = "SELECT * FROM productos WHERE stock > 0";
                $resultadoProductos = mysqli_query($conex, $consultaProductos);
                //para que nos muestre todos los productos disponibles
                while ($producto = mysqli_fetch_assoc($resultadoProductos)) {
                    echo "<option value='" . $producto['idProducto'] . "'>" . $producto['nombre'] . " (Stock: " . $producto['stock'] . ")</option>";
                }
                ?>
            </select><br>

            <label>Cantidad:</label>
            <input type="number" name="productos[0][cantidad]" min="1" required><br>

            <label>Nota:</label>
            <input type="text" name="productos[0][nota]"><br>
        </div>
    </div>

    <button type="submit" name="registrar_productos">Registrar Productos</button>
</form>

<!-- Listado de productos añadidos al pedido -->
<h2>Productos en el Pedido</h2>
<ul>
<?php

// vamos a seleccionar el iddetallepedido en la consulta para asocarlo con cada producto,
// para que cuando queramos cancelarlo el servidor sepa que registro eliminar.
$consultaDetalles = "SELECT dp.idDetallePedido, dp.cantidad, p.nombre 
                     FROM detallepedidos dp 
                     INNER JOIN productos p ON dp.idProducto = p.idProducto
                     WHERE dp.idPedido = (SELECT idPedido FROM pedidos WHERE idMesa = $idMesa AND estado = 'pendiente')";
$resultadoDetalles = mysqli_query($conex, $consultaDetalles);

// Recorremos el resultado de la consulta para mostrar cada producto en la lista.
while ($detalle = mysqli_fetch_assoc($resultadoDetalles)) {
    // Mostramos el nombre del producto y la cantidad asociada al pedido.
    echo "<li>" . $detalle['nombre'] . " - Cantidad: " . $detalle['cantidad'] . "</li>";
    // Creamos un formulario para cancelar el producto específico. 
    // Esto permite eliminar un producto del pedido antes de enviarlo a la cocina.
    echo "<form method='POST' action='gestionar_pedidos.php?idMesa=$idMesa'>";
    echo "<input type='hidden' name='idDetallePedido' value='" . $detalle['idDetallePedido'] . "'>";
    echo "<button type='submit' name='cancelar_producto'>Cancelar</button>";
    echo "</form>";
}
?>
</ul>

<!-- Botón para enviar a cocina -->
<form method="POST" action="gestionar_pedidos.php?idMesa=<?php echo $idMesa; ?>">
    <input type="hidden" name="idPedido" value="<?php echo $idPedido; ?>">
    <button type="submit" name="enviar_cocina">Enviar a Cocina</button>
</form>

<a href="camarero_dashboard.php">Volver atrás</a>