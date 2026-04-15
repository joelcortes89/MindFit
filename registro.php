<?php
require_once "conexion.php";

$mensaje = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

 
    $nombre = trim($_POST["nombre"] ?? "");
    $edad = (int) ($_POST["edad"] ?? 0);
    $correo = trim($_POST["correo"] ?? "");
    $peso = (float) ($_POST["peso"] ?? 0);
    $talla = (float) ($_POST["talla"] ?? 0);

    $password = $_POST["password"] ?? "";
    $confirmar = $_POST["confirmar_password"] ?? "";


    if (
        empty($nombre) ||
        empty($edad) ||
        empty($correo) ||
        empty($password) ||
        empty($confirmar)
    ) {
        $mensaje = "<div class='mensaje error'>Por favor completa todos los campos obligatorios</div>";
    }
    elseif ($password !== $confirmar) {
        $mensaje = "<div class='mensaje error'>Las contraseñas no coinciden</div>";
    }
    else {

   
        $verificar = $conexion->prepare("
            SELECT id FROM usuarios WHERE correo = ?
        ");

        $verificar->bind_param("s", $correo);
        $verificar->execute();
        $resultado = $verificar->get_result();

        if ($resultado->num_rows > 0) {
            $mensaje = "<div class='mensaje error'>Este correo ya está registrado</div>";
        } else {

       
            $hash = password_hash($password, PASSWORD_DEFAULT);

     
            $stmt = $conexion->prepare("
                INSERT INTO usuarios 
                (nombre, edad, correo, peso, talla, contraseña)
                VALUES (?, ?, ?, ?, ?, ?)
            ");

            $stmt->bind_param(
                "sisdds",
                $nombre,
                $edad,
                $correo,
                $peso,
                $talla,
                $hash
            );

            if ($stmt->execute()) {
                $mensaje = "<div class='mensaje exito'>Registro exitoso ✔ Ya puedes iniciar sesión</div>";
            } else {
                $mensaje = "<div class='mensaje error'>Error al registrar usuario</div>";
            }

            $stmt->close();
        }

        $verificar->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro | Mindfit</title>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>


<nav class="navbar">
    <div class="navbar-logo">
        <span class="logo-mind">mind</span><span class="logo-fit">fit</span>
    </div>
</nav>

<section class="formulario-registro">

    <div class="contenedor-formulario">

        <h2>Crear Cuenta</h2>

        <?php echo $mensaje; ?>

        <form method="POST">

            <div class="campo-formulario">
                <label>Nombre Completo</label>
                <input type="text" name="nombre_completo" required>
            </div>

            <div class="campo-formulario">
                <label>Edad</label>
                <input type="number" name="edad" min="1" max="120" required>
            </div>

            <div class="campo-formulario">
                <label>Correo Electrónico</label>
                <input type="email" name="correo" required>
            </div>

            <div class="campo-formulario">
                <label>Peso (kg)</label>
                <input type="number" step="0.01" name="peso">
            </div>

            <div class="campo-formulario">
                <label>Talla (m)</label>
                <input type="number" step="0.01" name="talla">
            </div>

            <!-- CONTRASEÑA -->
            <div class="campo-formulario">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>

            <!-- CONFIRMACIÓN -->
            <div class="campo-formulario">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirmar_password" required>
            </div>

            <button type="submit" class="btn-enviar">
                Registrarse
            </button>

        </form>

    </div>

</section>

</body>
</html>
