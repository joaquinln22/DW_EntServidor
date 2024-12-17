<?php
require __DIR__ . '/escpos/vendor/mike42/escpos-php/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

include('Conexion.php'); // Conexión a la base de datos

$nombre_impresora = " "; //nombre o ip de la impresora

if (isset($_GET['idMesa'])) {
    $idMesa = (int)$_GET['idMesa'];

    // Recuperar los detalles del pedido de la mesa
    $consultaPedidos = "
        SELECT p.idPedido, dp.cantidad, pr.nombre, pr.precio, dp.nota
        FROM pedidos p
        JOIN detallepedidos dp ON p.idPedido = dp.idPedido
        JOIN productos pr ON dp.idProducto = pr.idProducto
        WHERE p.idMesa = $idMesa AND p.estado = 'servido'";

    $resultadoPedidos = mysqli_query($conex, $consultaPedidos);

    // Configurar conexión con la impresora
    $connector = new WindowsPrintConnector($nombre_impresora);
    $printer = new Printer($connector);

    // Configurar el logotipo opcional
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    try {
        $logo = EscposImage::load("logo.png", false);
        $printer->bitImage($logo);
    } catch (Exception $e) {
        //si no hay error se ignora
    }

    // Encabezado del ticket
    $printer->text("Restaurante Gadea\n");
    $printer->text("Mesa #" . $idMesa . "\n");
    $printer->text(date("Y-m-d H:i:s") . "\n");
    $printer->text("--------------------------------\n");

    // Variables de cálculo
    $total = 0;

    // Imprimir detalles del pedido
    while ($pedido = mysqli_fetch_assoc($resultadoPedidos)) {
        $subtotal = $pedido['precio'] * $pedido['cantidad'];
        $total += $subtotal;

        // Producto alineado a la izquierda
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text($pedido['cantidad'] . "x " . $pedido['nombre'] . "\n");

        // Nota adicional del producto (si existe)
        if (!empty($pedido['nota'])) {
            $printer->text("Nota: " . $pedido['nota'] . "\n");
        }

        // Precio alineado a la derecha
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("$" . number_format($pedido['precio'], 2) . " c/u\n");
        $printer->text("Subtotal: $" . number_format($subtotal, 2) . "\n");
    }

    // Total del pedido
    $printer->text("--------------------------------\n");
    $printer->text("TOTAL: $" . number_format($total, 2) . "\n");
    $printer->text("--------------------------------\n");

    // Pie de página
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("Gracias por su visita!\n");
    $printer->text("Vuelva pronto\n");

    // Alimentar y cortar papel
    $printer->feed(3);
    $printer->cut();
    $printer->pulse();

    // Cerrar la conexión con la impresora
    $printer->close();

    // Cambiar el estado de los pedidos a 'pagado' y la mesa a 'libre'
    $consultaActualizarMesa = "UPDATE mesas SET estado = 'libre' WHERE idMesa = $idMesa";
    mysqli_query($conex, $consultaActualizarMesa);

    $consultaActualizarPedidos = "UPDATE pedidos SET estado = 'pagado' WHERE idMesa = $idMesa AND estado = 'servido'";
    mysqli_query($conex, $consultaActualizarPedidos);

    echo "Ticket impreso y mesa liberada correctamente.";
} else {
    echo "Error: ID de mesa no especificado.";
}
?>