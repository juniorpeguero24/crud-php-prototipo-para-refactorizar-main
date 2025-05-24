<?php
include 'config.php';

$id = $_GET['id'];
$result = $connection->query("SELECT * FROM students WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "UPDATE students SET fullname='$name', email='$email', age=$age WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="w3-container w3-padding-32">
    <h2 class="w3-center" >Editar Estudiante</h2>
    <!--<form method="post">--> <!--NO SE HACE si no especifo action, usa la url actual con el id por GET-->

    <!-- En el action se agrega el id de la fila que estoy editando--> 
    <form class="w3-card-4 w3-padding w3-light-grey" action="update.php?id=<?= $row['id'] ?>" method="post">
        Nombre completo: <input class="w3-input w3-border" type="text" name="fullname" value="<?= $row['fullname'] ?>" required><br>
        Email: <input class="w3-input w3-border" type="email" name="email" value="<?= $row['email'] ?>" required><br>
        Edad: <input class="w3-input w3-border" type="number" name="age" value="<?= $row['age'] ?>" required><br>
        <input class="w3-input w3-border w3-green" type="submit" value="Actualizar">
    </form>
</body>
</html>


