<?php
session_start();

//Si aún no se ha cargado ningún idioma cargamos el español por defecto
if(!isset($_POST['idioma']) && empty($_POST['idioma'])) {
	include("lang/lang_es.php");
	$textos=$lang_es;
	echo "es";
}

//Si elejo el idioma sin poner el email o la contraseña cambio solo el idioma
if(isset($_POST['idioma'])) {
    $idioma=$_POST['idioma'];
	if ($idioma=='es'){
		include("lang/lang_es.php");
		$textos=$lang_es;
	}
	else if ($idioma=='en'){
		include("lang/lang_en.php");
		$textos=$lang_en;
	}
	$_SESSION["idioma"]=$idioma;
}
//Si elijo el idioma poniendo el email y la contraseña y el email es admin redirecciono a
//la página de inicio.php
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['idioma']) && !empty($_POST['email']) 
&& !empty($_POST['password'])&& !empty($_POST['idioma'])) {
	$email=$_POST['email'];
	$contrasena=$_POST['password'];
	$idioma=$_POST['idioma'];

//Vemos en que idioma vamos a usar la página web
	
if(isset($idioma)){
	if ($idioma=='es'){
		include("lang/lang_es.php");
		$textos=$lang_es;
	}
	else if ($idioma=='en'){
		include("lang/lang_en.php");
		$textos=$lang_en;
	}
	//Guardamos el idioma en una varible de sesión para usarla por todo nuestro portal web
	$_SESSION["idioma"]=$idioma;
}
echo '<div id="middle">';

//Si elijo el idioma poniendo el email y la contraseña y el email es admin redirecciono a
//la página de inicio.php	
if($email=="admin") {			
	header("Location: inicio.php");
}
else{
	$smsComprobar=$textos['Indsms8'];
	}
	}

?>


<?php
//Creo el formulario, que contiene el email, la contraseña y el idioma.
?>

<form action="" method="POST">
<fieldset>
<legend><?php echo $textos['Indsms1'];?></legend>
<div id="BloqueFormulario">
	<label for="Email"><strong><img src="img/usuario.png" width="24" height="24" align="left"><?php echo $textos['Indsms2'];?></strong>:</label>
	<input name="email" id="email" value="" size="40" maxlength="100" type="text" class="CampoFormulario" required>
</div>
<div id="BloqueFormulario">
	<label for="Contrasena"> <strong><img src="img/usuario.png" width="24" height="24" align="left"><?php echo $textos['Indsms3'];?></strong>:</label>
	<input name="password" id="password" value="" size="40" maxlength="50" type="password" class="CampoFormulario" required>
</div>
<div id="BloqueFormulario">
<label for="Idioma"> <strong><img src="img/idiomas.jpg" width="48" height="24" align="left"><?php echo $textos['Indsms4'];?></strong>:</label>

<select name="idioma" id="idioma" class="CampoFormulario" onChange="submit()";>
		<?php
		if (isset($_SESSION["idioma"])){
			if ($_SESSION["idioma"]=="en"){
			?>
				<option value="en"><?php echo $textos['Indsms6'];?></option>
				<option value="es"><?php echo $textos['Indsms5'];?></option>
				<?php
			}
		else{
		?>
		<option value="es"><?php echo $textos['Indsms5'];?></option>
		<option value="en"><?php echo $textos['Indsms6'];?></option>
		<?php }
			}else{
			?>
		<option value="es"><?php echo $textos['Indsms5'];?></option>
		<option value="en"><?php echo $textos['Indsms6'];?></option>
		<?php }
		?>
</select>
</div>
<br /><br />
     <p><input type="submit" name="login" value="<?php echo $textos['Indsms7'];?>"  /></p>
</fieldset>
</form>
<?php
	if (isset($smsComprobar)){
		echo '<div id="AlertNoOk">'.$smsComprobar.'</div>';
	}
?>
</div>
