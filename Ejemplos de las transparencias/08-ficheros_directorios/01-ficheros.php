<?php
	$archivo = fopen("ejemplo.txt" , "w");
	fputs ($archivo, "Hola Mundo");
	fclose ($archivo);
?>
