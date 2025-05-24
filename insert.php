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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Estudiante</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="w3-container w3-padding-32">
    <h2 class='w3-center w3-margin'>Agregar Estudiante</h2>
    <form class="w3-card-4 w3-padding w3-light-grey" action="insert.php" method="post">
        Nombre completo: <input class="w3-input w3-border" type="text" name="fullname" required><br>
        Email: <input class="w3-input w3-border" type="email" name="email" required><br>
        Edad: <input class="w3-input w3-border" type="number" name="age" required><br>
        <input class="w3-input w3-border w3-green" type="submit" value="Guardar">
    </form>    
</body>
</html>


