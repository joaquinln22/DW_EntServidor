<?php
session_start();
// Comprobar si el usuario esta logeado
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] != "encargado") {
    header("Location: index.php");
    exit();
}
