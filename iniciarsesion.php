<?php
session_start();
require_once "conexion.php";

/** @var mysqli $conexion */
if (!isset($conexion)) {
    if (function_exists('conexion')) {
        $conexion = conexion();
    } elseif (function_exists('getConexion')) {
        $conexion = getConexion();
    } elseif (defined('DB_HOST') && defined('DB_USER') && defined('DB_PASS') && defined('DB_NAME')) {
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    } elseif (defined('DB_SERVER') && defined('DB_USERNAME') && defined('DB_PASSWORD') && defined('DB_NAME')) {
        $conexion = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }
}

if (!isset($conexion) || ($conexion instanceof mysqli && $conexion->connect_error)) {
    die("Error de conexión a la base de datos.");
}

$mensaje = "";



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];

  
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($password, $usuario["password_hash"])) {

$_SESSION["usuario"] = [
    "id" => $usuario["id"],
    "nombre" => $usuario["nombre_completo"],
    "correo" => $usuario["correo"],
    "rol" => $usuario["rol"]
];

        header("Location: admin.php");
        exit();

    } else {
        $mensaje = "Contraseña incorrecta";
    }
} else {
    $mensaje = "Usuario no encontrado";
}
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