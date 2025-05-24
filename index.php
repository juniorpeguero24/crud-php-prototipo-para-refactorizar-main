<?php
/**
 * Este es el script por donde comienza el sitio, el nombre index.php
 * es una convención estándar como puede serlo index.html
 */

/**
 * Al principio se incluye el archivo de configuración, que en este caso no es
 * una mala práctica porque está muy bien tener la conexión a la base de datos
 * en un solo lugar.
 */
include 'config.php';

/**
 * uso el objeto connection para ejecutar una consulta
 * a la base de datos.
 * query es una función("método") 
 */
$result = $connection->query("SELECT * FROM students");

/**
 * Con echo mostramos por "pantalla" (navegador web)
 * el html al cliente.
 */
echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<link rel='stylesheet' href='style.css'>";
echo "</head>";

echo "<body class='w3-container'>";
echo "<h2 class='w3-center w3-margin-top' style='text-shadow:1px 1px 0 #444'>Listado de Estudiantes</h2>";
echo "<div class='w3-center w3-margin-bottom' ><a class='w3-btn w3-green' href='insert.php'>Agregar Nuevo</a><br><br></div> ";

if ($result->num_rows > 0) {
    echo "<div class='w3-responsive w3-margin w3-container'>";
    echo "<table class='w3-table-all w3-hoverable w3-card-4' border='1' cellpadding='10'>";
    echo "<tr><th>Nombre</th><th>Email</th><th>Edad</th><th>Acciones</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['age']}</td>
                <td>
                    <a class='w3-button w3-blue w3-small' href='update.php?id={$row['id']}'>Editar</a> |
                    <a class='w3-button w3-red w3-small' href='delete.php?id={$row['id']}'>Borrar</a>
                </td>
              </tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "No hay estudiantes cargados.";
}
echo "</body>";
echo "</html>";
?>
