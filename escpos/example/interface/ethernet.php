<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

/* Most printers are open on port 9100, so you just need to know the IP 
 * address of your receipt printer, and then fsockopen() it on that port.
 */
try {
    $connector = new NetworkPrintConnector("192.168.36.169", 9100);
    
    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    $printer -> text("Tenemos a su madre secuestrada\n");$printer -> text("Si quiere volver a verla VIVA\n");$printer -> text("Entreguenos la impresora 3D en la siguiente direccion\n");$printer -> text("Calle Molineta, 28\n");$printer -> text("NO POLICIA!!!\n");$printer -> text("Somos mafia peligrosa\n");$printer;
    $printer -> cut();
    
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
