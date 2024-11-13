<?php
	$num=3;
	$archivo = fopen("Tabla.txt" , "w");
	fputs ($archivo, "La tabla del $num es:".PHP_EOL);
	for ($cont=0;$cont<=10;$cont++){
		$result=$num*$cont;
		fputs ($archivo, "$num x $cont = $result".PHP_EOL);
	}
	fclose ($archivo);
?>
