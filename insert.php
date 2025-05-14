<?php
include 'config.php';

/**
 * $_SERVER con esta "super-global" detecto con qué método
 * consultan al servidor.
 * https://www.php.net/manual/es/reserved.variables.request.php
 * https://www.php.net/manual/es/language.variables.superglobals.php 
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (fullname, email, age)
            VALUES ('$name', '$email', $age)";

    if ($connection->query($sql) === TRUE) {
        /**
         * la función header redirige a la página principal index.php
         * de lo contrario recargaría la misma página.
         */
        header("Location: index.php"); 
        exit;
    } else {
        echo "Error al insertar: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Estudiante</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container w3-padding-32">

    <h2 class="w3-center">Agregar Estudiante</h2>

    <form class="w3-card-4 w3-padding w3-light-grey" action="insert.php" method="post">
        <p>
            <label>Nombre completo</label>
            <input class="w3-input w3-border" type="text" name="fullname" required>
        </p>
        <p>
            <label>Email</label>
            <input class="w3-input w3-border" type="email" name="email" required>
        </p>
        <p>
            <label>Edad</label>
            <input class="w3-input w3-border" type="number" name="age" required>
        </p>
        <p>
            <button class="w3-button w3-green" type="submit">Guardar</button>
            <a href="index.php" class="w3-button w3-grey">Cancelar</a>
        </p>
    </form>

</body>
</html>