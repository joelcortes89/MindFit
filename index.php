<?php
$nombre_sitio = "Mindfit";
$titulo_principal = "Entrena tu Cuerpo y Fortalece tu Mente";
$subtitulo_principal = "Programas integrados para alcanzar tu máximo potencial físico y mental";
$anio_actual = date("Y");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre_sitio; ?> - Inicio</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-logo">
            <span class="logo-mind">mind</span><span class="logo-fit">fit</span>
        </div>
        <div class="navbar-links">
            <a href="#inicio">Inicio</a>
            <a href="#recursos">Recursos</a>
            <a href="#nosotros">Sobre Nosotros</a>
            <a href="iniciarsesion.php" class="btn-iniciar-sesion">Iniciar Sesión</a>
            <a href="registro.php" class="btn-destacado">Empezar Ahora</a>
        </div>
    </nav>

    <section id="inicio" class="hero">
        <div class="hero-contenido">
            <h1><?php echo $titulo_principal; ?></h1>
            <p><?php echo $subtitulo_principal; ?></p>
        </div>
        <div class="hero-imagen">
            <img src="https://muvhit.com/wp-content/uploads/2023/11/DALL%C2%B7E-2023-11-28-10.57.55-A-whimsical-illustration-of-a-human-brain-lifting-weights.-The-brain-is-anthropomorphized-with-cartoon-like-features-including-expressive-eyes-and-a-.jpg" 
                 alt="Unión de entrenamiento físico y mental">
        </div>
    </section>

    <section id="entrenamientos" class="caracteristicas">
        <h2>Nuestros Ejes de Entrenamiento</h2>
        <div class="tarjetas-grid">
            <div class="tarjeta">
                <i class="fas fa-dumbbell tarjeta-icono"></i>
                <h3>Entrenamiento Físico</h3>
                <p>Rutinas adaptadas a tu nivel, desde fuerza y resistencia hasta flexibilidad y movilidad.</p>
            </div>
            <div class="tarjeta">
                <i class="fas fa-brain tarjeta-icono"></i>
                <h3>Entrenamiento Mental</h3>
                <p>Técnicas de meditación, mindfulness y ejercicios cognitivos para mejorar tu bienestar emocional.</p>
            </div>
            <div class="tarjeta">
                <i class="fas fa-apple-alt tarjeta-icono"></i>
                <h3>Nutrición Equilibrada</h3>
                <p>Consejos y planes alimenticios diseñados para complementar tu físico y tu mente.</p>
            </div>
        </div>
    </section>


    <footer class="pie-pagina">
        <p>&copy; <?php echo $anio_actual; ?> <?php echo $nombre_sitio; ?>. Todos los derechos reservados.</p>
    </footer>
</body>
</html>