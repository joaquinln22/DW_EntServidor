<?php
// camarero_dashboard.php
session_start();
include('Conexion.php');
include('security.php');
verificarRol('camarero');

// Abrir una mesa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['abrir_mesa'])) {
    $numeroMesa = (int)$_POST['numeroMesa'];
    $capacidad = (int)$_POST['capacidad'];

    // Comprobar si hay alguna mesa con el mismo número en estado "ocupada"
    $consultaMesaOcupada = "SELECT COUNT(*) as total FROM mesas WHERE numeroMesa = $numeroMesa AND estado = 'ocupada'";
    $resultadoMesaOcupada = mysqli_query($conex, $consultaMesaOcupada);
    $fila = mysqli_fetch_assoc($resultadoMesaOcupada);

    if ($fila['total'] > 0) {
        echo "No se puede abrir una nueva mesa. La mesa número $numeroMesa ya está ocupada.";
    } else {
        // Si no hay mesas ocupadas con el mismo número, creamos un nuevo registro
        $consultaCrearMesa = "INSERT INTO mesas (numeroMesa, estado, capacidad) 
                              VALUES ($numeroMesa, 'ocupada', $capacidad)";
        if (mysqli_query($conex, $consultaCrearMesa)) {
            echo "Mesa creada y ocupada correctamente.";
        } else {
            echo "Error al crear la mesa: " . mysqli_error($conex);
        }
    }
}

// Liberar una mesa (marcar como "libre")
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['liberar_mesa'])) {
    $idMesa = (int)$_POST['idMesa'];

    // Verificar si los pedidos vinculados están pagados
    $consultaPedidosPendientes = "SELECT * FROM pedidos 
                                  WHERE idMesa = $idMesa AND estado != 'pagado'";
    $resultadoPedidosPendientes = mysqli_query($conex, $consultaPedidosPendientes);

    if (mysqli_num_rows($resultadoPedidosPendientes) > 0) {
        echo "No se puede liberar la mesa porque aún hay pedidos pendientes de pago.";
    } else {
        // Cambiar el estado de la mesa a "libre"
        $consultaLiberarMesa = "UPDATE mesas SET estado = 'libre' WHERE idMesa = $idMesa";
        if (mysqli_query($conex, $consultaLiberarMesa)) {
            echo "Mesa liberada correctamente.";
        } else {
            echo "Error al liberar la mesa: " . mysqli_error($conex);
        }
    }
}
?>

<!-- Formulario para abrir una mesa -->
<h2>Abrir Mesa</h2>
<form method="POST" action="camarero_dashboard.php">
    <label>Número de Mesa:</label>
    <input type="number" name="numeroMesa" required><br>

    <label>Capacidad:</label>
    <input type="number" name="capacidad" required><br>

    <button type="submit" name="abrir_mesa">Abrir Mesa</button>
</form>

<!-- Mostrar mesas activas -->
<h2>Mesas Activas</h2>
<ul>
<?php
$consultaMesas = "SELECT * FROM mesas WHERE estado = 'ocupada'";
$resultadoMesas = mysqli_query($conex, $consultaMesas);

while ($mesa = mysqli_fetch_assoc($resultadoMesas)) {
    echo "<li>Mesa " . $mesa['numeroMesa'] . " - Capacidad: " . $mesa['capacidad'] . "</li>";

    // Botón para seleccionar mesa
    echo "<form method='GET' action='gestionar_pedidos.php' style='display:inline;'>";
    echo "<input type='hidden' name='idMesa' value='" . $mesa['idMesa'] . "'>";
    echo "<button type='submit'>Seleccionar Mesa</button>";
    echo "</form>";

    // Botón para liberar mesa
    echo "<form method='POST' action='camarero_dashboard.php' style='display:inline;'>";
    echo "<input type='hidden' name='idMesa' value='" . $mesa['idMesa'] . "'>";
    echo "<button type='submit' name='liberar_mesa'>Liberar</button>";
    echo "</form>";
}
?>
</ul>
