<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Agregar Nueva Tarea</h1>
    </header>
    <main>
        <form method="POST" class="form-task">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            <button type="submit" class="btn-primary">Guardar</button>
            <a href="index.php" class="btn-secondary">Volver</a>
        </form>
    </main>
</body>
</html>
