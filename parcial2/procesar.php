<?php
echo "<h2>Turno reservado en Veterinaria Patitas</h2>";
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mascota = $_POST["mascota"];

echo "<p>Nombre: $nombre</p>";
echo "<p>Correo: $correo</p>";
echo "<p>Mensaje: $mascota</p>";

$servicios = [
    "Consulta general - Bs 60",
    "Vacuna antirrabica - Bs 40",
    "Bano y corte - Bs 50"
];
echo "<ul>";
foreach ($servicios as $servicio) {
    echo "<li>" . $servicio . "</li>";
}
echo "</ul>";

echo "<p>Te atiende Gracia Esther Sillerico Herrera.</p>";

?>