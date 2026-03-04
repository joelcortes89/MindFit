<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindFit</title>
    <link src="css/style.css" rel="stylesheet">
    <link src="css/style_Mindfit.css" rel="stylesheet">


</head>

<body>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c5eaf0;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #ffffff;
            text-shadow: 2px 2px #302323;
        }
        p {
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
<header>
    <article>
        <img src="img/MF_removebg_preview.png" alt="Logo de MindFit" width="900">

    </article>
    

</header>

    <p>Tu espacio de bienestar mental y fisico</p>
    <h2>Inicia sesion o si no tienes una cuenta Registrate</h2>
    <form action="login.php" method="post">
<input type="text" name="username" placeholder="Usuario" required>
<input type="password" name="password" placeholder="Contraseña" required>

    
    <button type="submit" class="btn">Iniciar Sesión</button>
    <button type="button" class="btn" onclick="location.href='register.php'">Registrarse</button>
    



</body>
</html>