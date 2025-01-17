<?php
require '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos actuales de la tarea
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Actualizar la tarea
        $sql = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "ID de tarea no especificado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Editar Tarea</h1>
    </header>
    <main>
        <form method="POST" class="form-task">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" value="<?= htmlspecialchars($task['title']) ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" required><?= htmlspecialchars($task['description']) ?></textarea>
            </div>
            <button type="submit" class="btn-primary">Actualizar</button>
            <a href="index.php" class="btn-secondary">Cancelar</a>
        </form>
    </main>
</body>
</html>
