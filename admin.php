<?php
session_start();

if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["rol"] !== "admin") {
    header("Location: iniciarsesion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin | Mindfit</title>
    <link rel="stylesheet" href="css/styles2.css">
</head>
<body>

<h1>Panel de Administración</h1>

<p>Bienvenido, <?php echo $_SESSION["usuario"]["nombre"]; ?> </p>

<ul>
    <li><a href="index.php">Volver al inicio/Cerrar sesión</a></li>
    <li><a href="crear_rutina.php">Crear Rutina</a></li>
    <li><a href="crear_nutricion.php">Crear Plan Nutricional</a></li>
    <li><a href="ver_usuarios.php">Ver Usuarios</a></li>
</ul>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>