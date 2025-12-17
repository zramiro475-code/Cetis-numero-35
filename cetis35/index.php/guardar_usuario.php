<?php
// Incluir la conexión
include("conexion.php");

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $especialidad = $_POST["especialidad"];
    $turno = $_POST["turno"];



    // Preparar la consulta SQL
    $sql = "INSERT INTO usuarios (nombre, edad, especialidad, turno) VALUES (?, ?, ?, ?)";

    // Usar prepared statements para mayor seguridad
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $edad, $especialidad, $turno);

    if ($stmt->execute()) {
        echo "<h3>Usuario guardado correctamente.</h3>";
    } else {
        echo "Error al guardar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
