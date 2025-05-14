<?php
include 'config.php';
$result = $connection->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Estudiantes</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">

  <h2 class="w3-center w3-margin-top">Listado de Estudiantes</h2>

  <div class="w3-right w3-margin-bottom">
    <a href="insert.php" class="w3-button w3-green">Agregar Nuevo</a>
  </div>

  <?php if ($result->num_rows > 0): ?>
    <table class="w3-table-all w3-hoverable w3-card-4">
      <thead>
        <tr class="w3-light-grey">
          <th>Nombre</th>
          <th>Email</th>
          <th>Edad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['fullname']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['age']) ?></td>
            <td>
              <a href="update.php?id=<?= $row['id'] ?>" class="w3-button w3-blue w3-small">Editar</a>
              <a href="delete.php?id=<?= $row['id'] ?>" class="w3-button w3-red w3-small">Borrar</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No hay estudiantes cargados.</p>
  <?php endif; ?>

</body>
</html>
