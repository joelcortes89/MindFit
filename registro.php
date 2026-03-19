<?php

$servidor = "localhost";
$usuario_bd = "root"; 
$contraseña_bd = "";
$nombre_bd = "mindfit";


$conexion = new mysqli($servidor, $usuario_bd, $contraseña_bd, $nombre_bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = mysqli_real_escape_string($conexion, $_POST["nombre_completo"]);
    $edad = (int)$_POST["edad"];
    $correo = mysqli_real_escape_string($conexion, $_POST["correo"]);
    $peso = (float)$_POST["peso"];
    $talla = (float)$_POST["talla"];


    $sql = "INSERT INTO registro (nombre_completo, edad, correo, peso, talla)
            VALUES ('$nombre_completo', $edad, '$correo', $peso, $talla)";


    if ($conexion->query($sql) === TRUE) {
        $mensaje = "<p style='color: green; text-align: center;'>Registro guardado exitosamente!</p>";

        $_POST = array();
    } else {
        $mensaje = "<p style='color: red; text-align: center;'>Error: " . $sql . "<br>" . $conexion->error . "</p>";
    }


    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindfit - Registro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>

    <nav class="navbar">
        <div class="navbar-logo">
            <span class="logo-mind">mind</span><span class="logo-fit">fit</span>
        </div>
        <div class="navbar-links">
            <a href="index.php">Inicio</a>
            <a href="#entrenamientos">Entrenamientos</a>
            <a href="#recursos">Recursos</a>
            <a href="#nosotros">Sobre Nosotros</a>
            <a href="registro.php" class="btn-destacado">Empezar Ahora</a>
        </div>
    </nav>


    <section class="formulario-registro">
        <div class="contenedor-formulario">
            <h2>Completa tu Registro</h2>
            <?php echo $mensaje; ?>
            <form method="POST" action="registro.php">
                <div class="campo-formulario">
                    <label for="nombre_completo">Nombre Completo</label>
                    <input type="text" id="nombre_completo" name="nombre_completo" required>
                </div>

                <div class="campo-formulario">
                    <label for="edad">Edad</label>
                    <input type="number" id="edad" name="edad" min="1" max="120" required>
                </div>

                <div class="campo-formulario">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" required>
                </div>

                <div class="campo-formulario">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" id="peso" name="peso" step="0.01" min="1" max="500" required>
                </div>

                <div class="campo-formulario">
                    <label for="talla">Talla (m)</label>
                    <input type="number" id="talla" name="talla" step="0.01" min="0.5" max="3" required>
                </div>

                <button type="submit" class="btn-enviar">Guardar Registro</button>
            </form>
        </div>
    </section>


    <footer class="pie-pagina">
        <p>&copy; <?php echo date("Y"); ?> Mindfit. Todos los derechos reservados.</p>
    </footer>
</body>
</html>