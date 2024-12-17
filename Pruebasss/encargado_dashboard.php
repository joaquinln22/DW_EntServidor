<?php
// encargado_dashboard.php
session_start();
include('Conexion.php');
include('security.php');
verificarRol('encargado'); // Solo permite acceso a encargados
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Encargado</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            background-image: url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80'); 
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column; 
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #ffffff; 
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px; 
            width: 100%;
            text-align: center; 
        }

        h1, h2 {
            color: #f8f9fa; 
        }

        .container a {
            color: #f8f9fa;
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 1rem; 
            text-align: left; 
        }

        label {
            display: block;
            margin-bottom: 0.5rem; 
            color: #f8f9fa; 
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%; 
            padding: 0.5rem;
            border: 1px solid #ced4da; 
            border-radius: 4px;
            box-sizing: border-box; 
        }

        button[type="submit"] {
            background-color: #ff6b6b;
            border-color: #ff6b6b;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%; 
        }

        button[type="submit"]:hover {
            background-color: #ff5252;
            border-color: #ff5252;
        }

        ul {
            list-style-type: none;
            margin: 1rem 0; 
            padding: 0;
            overflow: hidden;
            background-color: #333;
            width: 100%; 
        }

        li {
            float: left; 
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
        <p>Esta es la página principal para encargados. Desde aquí podrás gestionar el restaurante y el personal.</p>

        <ul>
            <li><a href="gestion_productos.php">Gestión de Productos</a></li>
            <li><a href="reportes_informes.php">Reportes e Informes</a></li>
            <li><a href="gestion_camareros.php">Gestión de Camareros</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>

        <h2>Registrar nuevo usuario</h2>
        <form action="registro_usuario.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" min="18" required>
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <option value="camarero">Camarero</option>
                    <option value="encargado">Encargado</option>
                </select>
            </div>
            <button type="submit">Registrar Usuario</button>
        </form>
    </div>
</body>
</html>

</html>