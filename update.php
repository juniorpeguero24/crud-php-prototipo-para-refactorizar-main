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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container w3-padding-32">

    <h2 class="w3-center">Editar Estudiante</h2>

    <form class="w3-card-4 w3-padding w3-light-grey" action="update.php?id=<?= $row['id'] ?>" method="post">
        <p>
            <label>Nombre completo</label>
            <input class="w3-input w3-border" type="text" name="fullname" value="<?= htmlspecialchars($row['fullname']) ?>" required>
        </p>
        <p>
            <label>Email</label>
            <input class="w3-input w3-border" type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
        </p>
        <p>
            <label>Edad</label>
            <input class="w3-input w3-border" type="number" name="age" value="<?= $row['age'] ?>" required>
        </p>
        <p>
            <button class="w3-button w3-blue" type="submit">Actualizar</button>
            <a href="index.php" class="w3-button w3-grey">Cancelar</a>
        </p>
    </form>

</body>
</html>
