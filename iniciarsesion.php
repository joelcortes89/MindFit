<?php
session_start();
require_once "conexion.php";

$mensaje = "";

if (isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];

  
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {

        $usuario = $resultado->fetch_assoc();

  
        if (password_verify($password, $usuario["contraseña"])) {

          
        
            $_SESSION["usuario"] = [
                "id" => $usuario["id"],
                "nombre" => $usuario["nombre"],
                "correo" => $usuario["correo"]
            ];

            // REDIRECCIÓN
            header("Location: index.php");
            exit();

        } else {
            $mensaje = "<div class='mensaje error'>Contraseña incorrecta</div>";
        }

    } else {
        $mensaje = "<div class='mensaje error'>Usuario no encontrado</div>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar Sesión | Mindfit</title>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<!-- LOGIN -->
<section class="formulario-registro">

    <div class="contenedor-formulario">

        <h2>Iniciar Sesión</h2>

        <?php echo $mensaje; ?>

        <form method="POST">

            <div class="campo-formulario">
                <label>Correo Electrónico</label>
                <input type="email" name="correo" required>
            </div>

            <div class="campo-formulario">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-enviar">
                Entrar
            </button>

        </form>

    </div>

</section>

</body>
</html>
