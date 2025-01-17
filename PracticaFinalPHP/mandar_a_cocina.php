<?php
include('conexion.php');
session_start();

// Verifica si se enviaron los datos
if (!isset($_POST['mesa_id'], $_POST['total'], $_SESSION['usuario_id'])) {
    echo '<script>
            alert("Error: Datos incompletos o sesión no válida.");
            window.history.back();
        </script>';
    exit;
}

$mesa_id = intval($_POST['mesa_id']);
$total = floatval($_POST['total']);
$camarero_id = intval($_SESSION['usuario_id']); // ID del camarero que inició sesión

// Inicia una transacción para garantizar la consistencia
mysqli_begin_transaction($conn);

if ($total<=0){
    echo '<script>
            alert("Pedido vacío.");
            window.location.href= "pedir.php?mesa=' . $mesa_id . '";
        </script>';
}else{
    try {
        // Inserta el pedido en la tabla pedidos
        $insertQuery = "INSERT INTO pedidos (mesa_id, camarero_id, total, estado)
                        VALUES ($mesa_id, $camarero_id, $total, 'pendiente')";
        if (!mysqli_query($conn, $insertQuery)) {
            throw new Exception("Error en insertQuery: " . mysqli_error($conn));
        }

        // Obtén el ID del pedido recién insertado
        $pedido_id = mysqli_insert_id($conn);

        // Consulta para obtener la hora de creación del pedido
        $queryCreacion = "SELECT creacion_pedido FROM pedidos WHERE id = $pedido_id";
        $resultCreacion = mysqli_query($conn, $queryCreacion);
        if (!$resultCreacion || mysqli_num_rows($resultCreacion) === 0) {
            throw new Exception("Error al obtener la hora de creación del pedido.");
        }
        $rowCreacion = mysqli_fetch_assoc($resultCreacion);
        $creacion_pedido = $rowCreacion['creacion_pedido'];

        // Actualiza los registros en producto_pedido con el ID del pedido y estado "en cocina"
        $updatePedidoIdQuery = "UPDATE producto_pedido 
                                SET pedido_id = $pedido_id, estado = 'en cocina' 
                                WHERE mesa_id = $mesa_id AND estado = 'pendiente'";
        if (!mysqli_query($conn, $updatePedidoIdQuery)) {
            throw new Exception("Error en updatePedidoIdQuery: " . mysqli_error($conn));
        }

        // Consulta para obtener los productos del pedido
        $queryProductos = "
            SELECT pp.cantidad, pp.notas, pr.nombre AS producto, pr.precio, 
                (pp.cantidad * pr.precio) AS subtotal
            FROM producto_pedido pp
            JOIN productos pr ON pp.producto_id = pr.id
            WHERE pp.pedido_id = $pedido_id";
        $resultProductos = mysqli_query($conn, $queryProductos);
        if (!$resultProductos) {
            throw new Exception("Error al obtener los productos: " . mysqli_error($conn));
        }

        // Confirma la transacción
        mysqli_commit($conn);

        echo '<script>
                alert("Pedido enviado a cocina correctamente.");
                window.location.href = "mesas.php";
                </script>';
    } catch (Exception $e) {
        // Si algo falla, revierte la transacción
        mysqli_rollback($conn);
        echo '<script>
                alert("Error al enviar el pedido: ' . addslashes($e->getMessage()) . '");
                window.history.back();
            </script>';
    }

    mysqli_close($conn);


    require_once('../vendor/autoload.php');

    $mpdf= new \Mpdf\Mpdf([

    ]);
        // Construye el contenido del ticket
        $html = "
        <h1 style='text-align: center;'>Restaurante LTGÜ</h1>
        <h2 style='text-align: center;'>Mesa $mesa_id</h2>
        <table style='width: 100%;'>
            <tr>
                <td style='text-align: left;'><strong>Camarero:</strong> $camarero_id</td>
                <td style='text-align: right;'>$creacion_pedido</td>
            </tr>
        </table>
        <hr>
        <h3>Productos</h3>
        <table style='width: 100%; border-collapse: collapse;'>
            <tbody>";
        
        // Itera sobre los productos y genera filas de tabla
        while ($producto = mysqli_fetch_assoc($resultProductos)) {
            $html .= "
            <tr>
                <td style='border: 1px solid #ffffff; padding: 5px;'>{$producto['cantidad']}x</td>
                <td style='border: 1px solid #ffffff; padding: 5px;'>{$producto['producto']}</td>
                <td style='border: 1px solid #ffffff; padding: 5px;'>{$producto['notas']}</td>
                <td style='border: 1px solid #ffffff; padding: 5px;'>€" . number_format($producto['subtotal'], 2) . "</td>
            </tr>";
        }

        $html .= "
            </tbody>
        </table>
        <h3>Total: €" . number_format($total, 2) . " (IVA inc.)</h3>
        <h1 style='text-align: center;'>Nº Pedido: $pedido_id</h1>";

        // Genera el PDF
        $mpdf->writeHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output();
}
?>