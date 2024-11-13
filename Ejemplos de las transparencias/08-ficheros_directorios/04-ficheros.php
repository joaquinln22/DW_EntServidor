<?php
	$archivo = fopen("ejemplo.txt" , "r");
	while(!feof($archivo)){
		$contenido =fgets ($archivo, 100); //Número de caráctere que lee cada vez
		print ($contenido);
		print "<br>";
	}
	fclose ($archivo);
?>
