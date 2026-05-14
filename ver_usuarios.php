<?php
session_start();

if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["rol"] !== "admin") {
    header("Location: iniciarsesion.php");
    exit();
}

$conexion = new mysqli("localhost", "root", "", "Mindfit");

$resultado = $conexion->query("SELECT id, nombre_completo, correo, rol FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios | Admin</title>
    <link rel="stylesheet" href="css/styles3.css">
</head>
<body>

<div class="panel">
    <h1>Usuarios Registrados</h1>

    <table class="tabla-usuarios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["nombre_completo"]; ?></td>
                <td><?php echo $row["correo"]; ?></td>
                <td>
                    <span class="rol <?php echo $row["rol"]; ?>">
                        <?php echo $row["rol"]; ?>
                    </span>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a href="admin.php">⬅ Volver</a>
</div>

</body>
</html>