<?php
	$archivo = fopen("ejemplo.txt" , "a");
	fputs ($archivo, PHP_EOL."Hola Mundo");
	fclose ($archivo);
?>
