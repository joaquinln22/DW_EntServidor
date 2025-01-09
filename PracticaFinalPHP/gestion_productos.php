<?php
include("seguridad_encargado.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>