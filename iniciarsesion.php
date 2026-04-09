<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="login-container">
    <h2>Iniciar Sesión</h2>

    <form method="POST" action="iniciarsesion.php">
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexion = mysqli_connect("localhost", "root", "", "mindfit");

    $correo = $_POST['correo'];
    $password = $_POST['contraseña'];

    $query = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        if (password_verify($password, $usuario['contraseña'])) {
            echo "Bienvenido";
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

}
?>
</body>
</html>