<html>
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de ejemplo</title>
</head>
</head>


<body>
<?php
if(isset($_POST['num1']) && isset($_POST['num2']) && 
!empty($_POST['num1']) && !empty($_POST['num2'])) {
	$num1=$_POST['num1'];
	$num2=$_POST['num2'];
	$sms=$num1+$num2;
}
?>
<form action="" method="POST">
<fieldset>
<legend>prueba</legend>
<div id="BloqueFormulario">
	<label for="num1">numero 1:</label>
	<input name="num1" id="num1" value="" size="40" maxlength="100" type="text" class="CampoFormulario" required>
</div>
<div id="BloqueFormulario">
	<label for="num2">numero 2:</label>
	<input name="num2" id="num2" value="" size="40" maxlength="100" type="text" class="CampoFormulario" required>
</div>
<br />

<?php
if(isset($sms)&& !empty($sms) ) {
	echo "La suma de los número introducidos es --> $sms";
}
?>

<br />
     <p><input type="submit" name="login" value="sumar"  /></p>
</fieldset>
</form>

</body>
</html>