<?php
$conexion = new mysqli("localhost", "root", "", "Mindfit");

$resultado = $conexion->query("SELECT * FROM rutinas");

while ($row = $resultado->fetch_assoc()) {
    echo "<h3>{$row['titulo']}</h3>";
    echo "<p>{$row['descripcion']}</p>";
}
?>